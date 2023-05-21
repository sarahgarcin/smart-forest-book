window.onload = function () {
    const article = document.getElementById("contents");
    const headings = article.querySelectorAll(".chapter h1");
    const toc = document.getElementById("toc");
    const totalHeadings = headings.length;
    let tocOl = document.createElement("ul");
    let tocFragment = new DocumentFragment();
    let mainLi = null;
    let subUl = null;
    let subLi = null;
    let isSibling = false;

    if(totalHeadings > 1) {
    for (let element of headings) {
        let anchor = document.createElement("a");
        let anchorText = element.innerText;
        anchor.innerText = anchorText;
        let elementId = anchorText.replaceAll(" ", "-").toLowerCase();
        anchor.href = "#" + elementId;
        element.id = elementId;
        let level = element.nodeName;

        mainLi = document.createElement("li");
        mainLi.appendChild(anchor);
        tocFragment.appendChild(mainLi);
        isSibling = false;
        subUl = null;
    }
    tocOl.append(tocFragment);
    toc.append(tocOl);
    } else {
        toc.style.display = "none";
    }

};