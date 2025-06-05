import React, {useState, useEffect} from 'react';
import SimpleBar from 'simplebar-react';

function DropdownContainer(props) {
  const {
    taxonomy,
    selected,
    taxSlug,
    menuList,
    closeRequest,

    setCloseRequest
  } = props;

  const defaultLabel = props.defaultLabel ? props.defaultLabel : '';

  const [currentLabel, setCurrentLabel] = useState('');
  const [open, setOpen] = useState(false);

  function labelChange() {
    if (selected && taxSlug && selected[taxSlug] && selected[taxSlug].length !== 0) {
      if (selected[taxSlug].length > 1) {
        setCurrentLabel('Multiple');
      }
      else {
        for (const term of taxonomy) {
          if (term.id == selected[taxSlug]) {
            setCurrentLabel(term.name);
          }
        }
      }
    }
    else if (menuList) {
      let itemId;
      menuList.forEach((menuItem, index) => {
        if (menuItem.active) {
          itemId = index;
        }
      });
      
      if (itemId !== undefined) {
        setCurrentLabel(menuList[itemId].label);
      }
      else {
        setCurrentLabel(defaultLabel);
      }
    }
    else {
      setCurrentLabel(defaultLabel);
    }
  }

  function toggleOpen(e) {
    if (e) {
      e.preventDefault();
    }
    setOpen(!open);
  }

  function close() {
    resetCloseRequest();
    setOpen(false);
  }

  function toggleClass() {
    const classString = open ? 'open' : '';
    return classString;
  }

  function resetCloseRequest() {
    if (closeRequest) {
      setCloseRequest(false);
    }
  }

  useEffect(() => {
    resetCloseRequest();
  }, []);

  useEffect(() => {
    labelChange();
  }, [selected, menuList]);

  useEffect(() => {
    close();
  }, [closeRequest]);

  //TODO: add chevron icon for current label

  return(
    <div className={`dropdown-container ${toggleClass()}`}>
      <button 
        className="dropdown-current" 
        onClick={(e) => {toggleOpen(e)}}
      ><span>{currentLabel}</span></button>
      <SimpleBar>
        {props.children}
      </SimpleBar>
    </div>
  )
}

export default DropdownContainer;