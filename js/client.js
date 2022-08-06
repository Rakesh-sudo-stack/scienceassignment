document.querySelector('#clearchecksbtn').addEventListener('click',(e)=>{
    e.preventDefault();
    let checkboxes = document.querySelectorAll('.checkbox');
    checkboxes = Array.from(checkboxes);
    checkboxes.forEach((element)=>{
        element.checked = false;
    })
    console.log(checkboxes);
});