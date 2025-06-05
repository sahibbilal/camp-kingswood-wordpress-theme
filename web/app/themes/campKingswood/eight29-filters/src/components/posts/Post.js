import React from 'react';
import FeaturedImage from '../FeaturedImage';

function post(props) {
  const {
    post,
    postType,
    displayAuthor,
    displayExcerpt,
    displayDate,
    displayCategories,

    replaceSelected, 
    theExcerpt
  } = props;

  let categories;
  let categoryItems;
  let featuredImage;
  let author;
  let excerpt;
  let date;
  let readtime;

  if (post.hasOwnProperty('_embedded') && post._embedded.hasOwnProperty('wp:featuredmedia') && post.featured_image_srcset) {
    featuredImage = <a href={post.link} className="eight29-featured-image">
      <figure>
        <FeaturedImage
          imageSize={'thumbnail-content-image'} 
          image={post._embedded['wp:featuredmedia']}
          srcset={post.featured_image_srcset}
        ></FeaturedImage>
      </figure>
    </a>
  }

  if (post.hasOwnProperty('_embedded') && post._embedded.hasOwnProperty('wp:term')) {
    categories = post._embedded['wp:term'][0];
  }

  if (categories && displayCategories) {
    categoryItems = categories.map((category, index) => {
      return (
        <a 
          key={category.id}
          onClick={() => {replaceSelected(category.id, category.taxonomy)}}
        >{category.name}</a>
      );
    });
  }

  if (post.author && displayAuthor) {
    author = <span className="author">By {post.author}</span>
  }

  if (post.excerpt && displayExcerpt) {
    excerpt = <div className="eight29-post-excerpt" dangerouslySetInnerHTML={{__html: theExcerpt(post.excerpt.rendered)}}>
    </div>
  }

  if (displayDate) {
    date = <time>{post.formatted_date}</time>
  }

  if (post.readtime) {
    readtime = <div className="eight29-post-readtime">{post.readtime}</div>
  }

  return (
    <article id={`${postType}-${post.id}`} className="eight29-post eight29-post-card">
      {featuredImage}

      <div className="eight29-post-body">
        <div className="eight29-post-categories">
         {categoryItems}
        </div>

        <h4 className="eight29-post-title"><a href={post.link}>{post.title.rendered}</a></h4>

        {excerpt}

        <div className="eight29-post-detail">
          {date}
          {author}
          {readtime}
        </div>
      </div>
    </article>
  );
}

export default post; 