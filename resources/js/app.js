let comment = document.querySelectorAll(".comment")
let commentEditForm = document.querySelectorAll(".commentEditInput")
let hiddenSubmit = document.querySelectorAll(".hiddenSubmit")
count = comment.length
value = []
commentEditForm.forEach(element => {
    value.push(element.value)
});
for (let index = 0; index < count; index++) {
    comment[index].addEventListener("click",(el)=>{
            if(el.target.closest('.edit')){
                commentEditForm[index].toggleAttribute("disabled")
                hiddenSubmit[index].toggleAttribute("hidden")
                button = el.target.closest('.edit')
                console.log(button.classList)
                if(commentEditForm[index].hasAttribute("disabled")){
                    button.innerHTML = "Изменить"
                    commentEditForm[index].value = value[index]
                    button.classList.toggle("btn-warning")
                }
                else{
                    button.innerHTML = "Отменить"
                    button.classList.toggle("btn-warning")
                }
                
            }
    });
    
}
