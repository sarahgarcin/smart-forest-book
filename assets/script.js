//  ----------------- AUTHORS PAGE ------------------
// class createAuthorsPage extends Paged.Handler {
//   constructor(chunker, polisher, caller) {
//     super(chunker, polisher, caller);
//   }

//   beforeParsed(content){ 
    
 
//   }
// }

// Paged.registerHandlers(createAuthorsPage);

//  ----------------- MICRO TYPOGRAPHY ------------------
// class microtypography extends Paged.Handler {
//   constructor(chunker, polisher, caller) {
//     super(chunker, polisher, caller);
//   }

//   beforeParsed(content){ 
//     fixTypos(string, locale, [configuration])
//     $('#textarea').val(fixTypos($('#textarea').val(), 'en-us'));
//   }
// }
// Paged.registerHandlers(microtypography);


//  ----------------- COVER IMAGE ------------------
class generateCover extends Paged.Handler {
  constructor(chunker, polisher, caller) {
    super(chunker, polisher, caller);
  }

  beforeParsed(content){ 
    // generateGrid(content, id of the div to draw the grid in)
    generateGrid(content, "pixels-grid-inner");
    generateGrid(content, "backcover-pixels-grid-inner");
  }
}

function generateGrid(content, el){
  var pixelsGrid = content.getElementById(el);

  var sectionHeight = 864;
  var sectionWidth = 576;

  // define y axis
  var yAxis = 0;

  // define width and height of squares
  var wh = 30;

  // while the y axis is less than the section height
  while (yAxis <= sectionHeight){
    // draw squares along the x axis
    for (var xAxis = 0; xAxis <= sectionWidth; xAxis += wh) {
       var tile = document.createElement("div");
       tile.classList.add("tile");
       tile.style.position = "absolute";
       tile.style.top = yAxis + "px";
       tile.style.left = xAxis + "px";
       tile.style.width = wh + "px";
       tile.style.height = wh + "px";
       tile.style.background = colorPicker();
       pixelsGrid.append(tile);

    }

      // move the y axis down to the next row
      yAxis += wh;
  }
}


function colorPicker(){
  // var items = Array(
  //   'rgb(0, 100, 61)',
  //   'rgb(0, 100, 61)',
  //   'rgb(0, 100, 61)',
  //   'rgb(0, 100, 61)',
  //   'rgb(0, 100, 61)',
  //   'rgb(0, 100, 61)',
  //   'rgb(0, 100, 61)',
  //   'rgb(0, 100, 61)',
  //   'rgb(0, 100, 61)',
  //   'rgb(0, 100, 61)',
  //   'rgb(88, 157, 134)',
  //   'rgb(88, 157, 134)',
  //   'rgb(88, 157, 134)',
  //   'rgb(88, 157, 134)',
  //   'rgb(184, 209, 200)',
  //   'rgb(184, 209, 200)',
  //   'rgb(184, 209, 200)',
  //   // 'rgb(240, 246, 243)',
  //   // 'rgb(142, 197, 0)',
  //   // 'rgb(197, 220, 0)',
  //   // 'rgb(255, 221, 50)'
  // );
  var items = Array(
    'rgb(0, 100, 61)',
    'rgb(0, 100, 61)',
    'rgb(0, 100, 61)',
    'rgb(0, 100, 61)',
    'rgb(0, 100, 61)',
    'rgb(0, 100, 61)',
    'rgb(0, 100, 61)',
    'rgb(0, 100, 61)',
    'rgb(0, 100, 61)',
    'rgb(0, 100, 61)',
    'rgb(0, 112, 32)',
    'rgb(0, 112, 32)',
    'rgb(0, 112, 32)',
    'rgb(25, 145, 0)',
    'rgb(25, 145, 0)',
    'rgb(25, 145, 0)',
    'rgb(25, 145, 0)',
    'rgb(69, 173, 0)',
    // 'rgb(142, 197, 0)',
    // 'rgb(197, 220, 0)',
    // 'rgb(255, 221, 50)'
  );
  var item  = items[Math.floor(Math.random()*items.length)];
  return item;
}
        

Paged.registerHandlers(generateCover);


// ----------------- BOOK INDEX ---------------------
class bookIndex extends Paged.Handler {
  constructor(chunker, polisher, caller) {
    super(chunker, polisher, caller);
  }

  beforeParsed(content){ 
    createIndex({
      spanClassIndex: 'book-index',
      indexElement: '#book-index',  
      idToGive : 'book-index', 
      alphabet: false,
      randomPos : true,
      content : content       
    });
    createIndex({
      spanClassIndex: 'author-index',
      indexElement: '#authors-index', 
      idToGive : 'author-index', 
      alphabet: false,
      randomPos : false,
      content : content       
    });
  }

}




Paged.registerHandlers(bookIndex);

function createIndex(config){
    let content = config.content;
    let indexElements = content.querySelectorAll("." + config.spanClassIndex);
    let arrayIndex = [];
    let num = 0;

  for(let i = 0; i < indexElements.length; ++i){
        let indexElement = indexElements[i];

        // create array with all data-book-index
        let indexKey = indexElement.dataset.bookIndex;
        let indexKeyFirst = indexKey.slice(0, 1);
        let newIndexKey; 
        if(indexKeyFirst == "<"){
            if(indexKey.slice(0, 3) == "<i>"){
                newIndexKey = indexKey.replace("<i>", "") + "-iTemp";         
            }else if(indexKey.slice(0, 4) == "<em>"){
                newIndexKey = indexKey.replace("<em>", "") + "-emTemp";
            }
        }else{
            newIndexKey = indexKey;
        }
        
        arrayIndex.push(newIndexKey);

        // create id for span whithout
        num++;
        if(indexElement.id == ''){ indexElement.id = config.idToGive + '-' + num; }
    }


    // filter array to remove dublicate and sort by alphabetical order
    let newArrayIndex = arrayIndex.filter(onlyUnique).sort(function(a,b) {
        a = a.toLowerCase();
        b = b.toLowerCase();
        if( a == b) return 0;
        return a < b ? -1 : 1;
    });

    // create <ul> element for the index
    let indexElementDiv = content.querySelector(config.indexElement);
    let indexUl = document.createElement("ul");
    indexUl.id = "list-index-generated-" + config.idToGive;
    indexElementDiv.appendChild(indexUl); 


    // create <li> element for the index
    for(var a = 0; a < newArrayIndex.length; a++){           
      // 11 et 42 
        // create alaphabet
        if(config.alphabet){
            z = a - 1;
            let firstLetter = newArrayIndex[a].toUpperCase().slice(0, 1);
            if(a == 0){
                let alphabetLiFirst = document.createElement("li");
                alphabetLiFirst.classList.add("list-alphabet-element");
                alphabetLiFirst.id = "alphabet-element-" + firstLetter;
                alphabetLiFirst.innerHTML = firstLetter;
                indexUl.appendChild(alphabetLiFirst);
            }
            if(z > 0){
                let firstLetterPrevious = newArrayIndex[z].toUpperCase().slice(0, 1);
                if(firstLetter != firstLetterPrevious){
                    let alphabetLi = document.createElement("li");
                    alphabetLi.classList.add("list-alphabet-element");
                    alphabetLi.id = "alphabet-element-" + firstLetter;
                    alphabetLi.innerHTML = firstLetter;
                    indexUl.appendChild(alphabetLi); 
                }
            }
        }

        // create <li> element for the index
        let indexNewLi = document.createElement("li");
        indexNewLi.classList.add("list-index-element");
        
        if(config.randomPos){
          let marginLeft = getRandomNumber(10, 3000/newArrayIndex.length);
          let marginTop = getRandomNumber(20, 1000/newArrayIndex.length);

          indexNewLi.style.marginTop = marginTop + "px";
          indexNewLi.style.marginLeft = marginLeft + "px";
        }
        
        let dataIndex;
        if(newArrayIndex[a].substr(newArrayIndex[a].length - 6) == "-iTemp"){
            dataIndex = "<i>" + newArrayIndex[a].replace("-iTemp", "");         
        }else if(newArrayIndex[a].substr(newArrayIndex[a].length - 7) == "-emTemp"){
            dataIndex = "<em>" + newArrayIndex[a].replace("-emTemp", "");   
        }else{
            dataIndex = newArrayIndex[a];
        }
    
        indexNewLi.dataset.listIndex = dataIndex;
        indexUl.appendChild(indexNewLi);  
    }

    let indexLi = content.getElementById('list-index-generated-' + config.idToGive).getElementsByClassName('list-index-element');

    for(var n = 0; n < indexLi.length; n++){
        
        // find data and add HTML of the list
        let dataIndex = indexLi[n].dataset.listIndex;
        let spanIndex = content.querySelectorAll("[data-book-index='" + dataIndex + "']");
        indexLi[n].innerHTML = '<span class="index-value">' + dataIndex + '</span><span class="links-pages"></span>';

        // add span for link page
        spanIndex.forEach(function(elem) {
            spanIndexId = elem.id;
            let spanPage = document.createElement("span");
            spanPage.classList.add("link-page");
            spanPage.innerHTML = '<a href="#' + spanIndexId + '"></a>';
            indexLi[n].getElementsByClassName('links-pages')[0].appendChild(spanPage);  
        });
  
    }
}


// function for filter array to remove dublicate
function onlyUnique(value, index, self) { 
    return self.indexOf(value) === index;
}






// ------------------ TABLE OF CONTENTS --------------

class toc extends Paged.Handler {
    constructor(chunker, polisher, caller) {
      super(chunker, polisher, caller);
    }

    beforeParsed(content){          
      createToc({
        content: content,
        tocElement: '#table-of-contents',
        titleElements: [ '.chapter h1' ]
      });
    }
    
  }
Paged.registerHandlers(toc);


// ------------------ B A C K      S I Z E  ----------------

class backSize extends Paged.Handler {
  constructor(chunker, polisher, caller) {
    super(chunker, polisher, caller);
  }
  beforePageLayout(page){
    // console.log(page);
    // pages.forEach(page => {
      if(page.element.classList.contains('pagedjs_back_page')){
        console.log(page);
        // var backW = page.startToken.node.style.width;
        // console.log(page);
        // console.log(page.startToken.node.style.width);

      }
    // });
  }
}


Paged.registerHandlers(backSize);


// -------------- URL TO FOOTNOTES SCRIPT -----------------

class urlToFootnotes extends Paged.Handler {
  constructor(chunker, polisher, caller) {
    super(chunker, polisher, caller);
  }

  beforeParsed(content) {
    let classNotes = "footnote";

    // add classNotes class to all url in text
    let aInP = content.querySelectorAll("p a");
    console.log(aInP);
    for (let i = 0; i < aInP.length; ++i) {
      let ahref = aInP[i].getAttribute("href");
      if(ahref != null){
        let spanUrlNotes = document.createElement("span");
        spanUrlNotes.classList.add(classNotes);
        spanUrlNotes.innerHTML = ahref;
        aInP[i].parentNode.insertBefore(spanUrlNotes, aInP[i].nextSibling);
      }
    }
  }
}

 Paged.registerHandlers(urlToFootnotes);


/* FUNCTIONS -------------------------------------------------------------------------------------- 
--------------------------------------------------------------------------------------------------- */

// TOC
function createToc(config){
    const content = config.content;
    const tocElement = config.tocElement;
    const titleElements = config.titleElements;
    
    let tocElementDiv = content.querySelector(tocElement);
    let tocUl = document.createElement("ul");
    tocUl.id = "list-toc-generated";
    tocElementDiv.appendChild(tocUl); 
    console.log(tocElementDiv);

    // add class to all title elements
    let tocElementNbr = 0;
    for(var i= 0; i < titleElements.length; i++){
        
        let titleHierarchy = i + 1;
        let titleElement = content.querySelectorAll(titleElements[i]);


        titleElement.forEach(function(element) {

            // add classes to the element
            element.classList.add("title-element");
            element.setAttribute("data-title-level", titleHierarchy);

            // add id if doesn't exist
            tocElementNbr++;
            idElement = element.id;
            if(idElement == ''){
                element.id = 'title-element-' + tocElementNbr;
            } 
            let newIdElement = element.id;

        });

    }

    // create toc list
    let tocElements = content.querySelectorAll(".title-element");  

    for(var i= 0; i < tocElements.length; i++){
        let tocElement = tocElements[i];

        let tocNewLi = document.createElement("li");

        // Add class for the hierarcy of toc
        tocNewLi.classList.add("toc-element");
        tocNewLi.classList.add("toc-element-level-" + tocElement.dataset.titleLevel);

        // Keep class of title elements
        let classTocElement = tocElement.classList;
        for(var n= 0; n < classTocElement.length; n++){
            if(classTocElement[n] != "title-element"){
                tocNewLi.classList.add(classTocElement[n]);
            }   
        }

        // Create the element
        tocNewLi.innerHTML = '<span class="chapter-number">'+i+'</span><span class="icon"><img src="assets/logbooks.svg"></span><a href="#' + tocElement.id + '">' + tocElement.innerHTML + '</a>';
        tocUl.appendChild(tocNewLi);  
    }

}

// MARGINS

function marginNoteTop(elem) {
  let marginTop = parseInt(window.getComputedStyle(elem).marginTop, 10)
  return marginTop;
}

function marginNoteBottom(elem) {
  let marginBottom = parseInt(window.getComputedStyle(elem).marginBottom, 10)
  return marginBottom;
}

function biggestMargin(a, b) {
  let margin;
  let marginBottom = marginNoteBottom(a);
  let marginTop = marginNoteTop(b);
  if (marginBottom > marginTop) {
    margin = marginBottom;
  } else {
    margin = marginTop;
  }
  return margin;
}


// ADD CSS

function addcss(css) {
  var head = document.getElementsByTagName('head')[0];
  var s = document.createElement('style');
  s.setAttribute('type', 'text/css');
  if (s.styleSheet) {   // IE
    s.styleSheet.cssText = css;
  } else {// the world
    s.appendChild(document.createTextNode(css));
  }
  head.appendChild(s);
}


// CAMEL CLASS NOTE

function toCamelClassNote(elem) {
  let splitClass = elem.split("-");
  if (splitClass.length > 1) {
    for (let s = 1; s < splitClass.length; ++s) {
      let strCapilize = splitClass[s].charAt(0).toUpperCase() + splitClass[s].slice(1)
      splitClass[s] = strCapilize;
    }
  }
  let reducer = (accumulator, currentValue) => accumulator + currentValue;
  let classCamel = splitClass.reduce(reducer);
  return classCamel;
}

// RANDOM NUMBER

function getRandomNumber(min, max) { 
	return Math.random() * (max - min) + min;
  
}