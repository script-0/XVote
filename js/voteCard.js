const voteClicked = function(element){
    element.childNodes.forEach(checkCheckbox);
}

function checkCheckbox(item, index) {   
    if(item instanceof HTMLInputElement && item.type == 'checkbox'){
        item.click();
    }
}
