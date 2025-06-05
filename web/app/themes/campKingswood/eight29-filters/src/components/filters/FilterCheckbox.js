import React, {useState} from 'react';
import FilterContainer from './FilterContainer';
import DropdownContainer from './DropdownContainer';

function FilterCheckbox(props) {
  const {
    taxonomy,
    selected,
    taxSlug,
    displayPostCounts,
    label,
    collapsible,
    scrollable,
    dropdown,

    toggleSelected,
    isSelected
  } = props;

  const [termOpen, setTermOpen] = useState({});
  const [closeRequest, setCloseRequest] = useState(false);

  let termList;
  let parentContent;
  let childrenList
  let childContent;
  let filterContent;

  if (taxonomy) {
    termList = taxonomy.map((term, index) => {
      let children;
      let childToggle;
  
      if (term.children && term['children'].length > 0) {
        childrenList = term['children'].map((child, index) => {
          if (displayPostCounts) {
            childContent = <label>
              <span>
                {child.name}
                <span className="eight29-category-count">({child.count})</span>
              </span>
            </label>
          }
          else {
            childContent = <label><span>{child.name}</span></label>
          }

          return (
            <li key={index}>
              <input 
                type="checkbox"
                value={child.slug}
                id={child.id}
                checked={isSelected(child.id, taxSlug)}
                onChange={() => {toggleSelected(child, taxSlug), setCloseRequest(true)}}
              ></input>
  
              {childContent}
            </li>
          );
        });
  
        children = <ul className="eight29-category-children">
          {childrenList}
        </ul>

        childToggle = <span 
          className="child-toggle"
          onClick={() => toggleTerm(term.slug)}
        ></span>
      }
  
      if (term.parent === 0) {
        if (displayPostCounts) {
          parentContent = <label>{term.name}
            <span className="eight29-category-count">({term.count})</span>
          </label>
        }
        else {
          parentContent = <label>{term.name}</label>
        }

        return (
          <li key={term.id} className={`${toggleTermClass(term.slug)}`}>
            <div>
              <input 
                type="checkbox"
                value={term.slug}
                id={term.id}
                checked={isSelected(term.id, taxSlug)}
                onChange={() => {toggleSelected(term, taxSlug), setCloseRequest(true)}}
              ></input>
    
              {parentContent}
              {childToggle}
            </div>

            {children}
          </li>
        );
      }
    });
  }

  function toggleTerm(slug) {
    if (termOpen){
      const objectCopy = {...termOpen};
      objectCopy[slug] = !objectCopy[slug];

      setTermOpen(objectCopy);
    }
  }

  function toggleTermClass(slug) {
    let classString = '';

    if (termOpen && termOpen[slug]) {
      classString = 'open';
    }

    return classString;
  }

  if (dropdown) {
    filterContent = <DropdownContainer
        selected={selected}
        taxSlug={taxSlug} 
        taxonomy={taxonomy}
        closeRequest={closeRequest}
        setCloseRequest={setCloseRequest}
        defaultLabel={label} 
      >
      <ul className="checkboxes dropdown-list">
        {termList}
      </ul>
    </DropdownContainer>
  }
  else {
    filterContent = <ul className="checkboxes">
      {termList}
    </ul>
  }

  return (
    <FilterContainer 
    className="filter-checkbox"
    label={label}
    collapsible={collapsible}
    scrollable={scrollable}
    >
      {filterContent}
    </FilterContainer>
  )
}

export default FilterCheckbox;