import React, {useState} from 'react';
import FilterContainer from './FilterContainer';

function FilterSelect(props) {
  const {
    taxonomy,
    taxSlug,
    selected,
    displayPostCounts,
    label,
    collapsible,
    scrollable,

    replaceSelected,
    isSelected
  } = props;

  const allTerms = [];

  let parentContent;
  let childContent;

  function changeValue(value) {
    if (value === 'empty') {
      replaceSelected(null, taxSlug);
    }

    else {
      replaceSelected(value, taxSlug);
    }
  }

  if (taxonomy) {
    allTerms.push(
        <option 
          key={'empty'}
          value={'empty'}
          id={`empty-${taxSlug}`}
        >All {label}
        </option>
    );

    taxonomy.forEach(term => {
      if (displayPostCounts) {
        parentContent = `${term.name} (${term.count})`;
      }
      else {
        parentContent = term.name;
      }

      allTerms.push(
        <option 
          key={term.id}
          value={`${term.id}`}
          id={`${taxSlug}-${term.id}`}
        >
        {parentContent}
        </option>
      )

      if (term.children) {
        term.children.forEach(child => {
          if (displayPostCounts) {
            childContent = `${child.name} (${child.count})`;
          }
          else {
            childContent = child.name;
          }

          allTerms.push(
            <option 
              key={child.id}
              value={`${child.id}`}
              id={child.id}
            >
            {childContent}
            </option>
          )
        });
      }
    });
  }

  return (
    <FilterContainer 
    className="filter-select"
    collapsible={collapsible}
    scrollable={scrollable}
    >
      <select
        defaultValue={0}
        multiple={false}
        value={selected[taxSlug]}
        onChange={(e) => {changeValue(e.target.value)}}
      >
        {allTerms}
      </select>
    </FilterContainer>
  )
}

export default FilterSelect;