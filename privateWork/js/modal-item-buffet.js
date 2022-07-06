toastr.options = {
    "closeButton": true,
    "debug": false,
    "newestOnTop": false,
    "progressBar": true,
    "positionClass": "toast-top-right",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "3000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
}


const toggleItemDelete = document.querySelector('#toggle-delete-item')
const closeDeleteItem = document.getElementById('closeItemDelete')
const toggleItemUpdate = document.querySelector('#toggle-update-item')
const closeUpdateItem = document.getElementById('closeUpdateItem')


closeDeleteItem.addEventListener("click", ()=>{
    toggleItemDelete.style.display = 'none'
})

closeUpdateItem.addEventListener("click", ()=>{
    toggleItemUpdate.style.display = 'none'
})



function deleteItem(self){
    
    const id = self.getAttribute('data-id');
    document.getElementById('excItemBuffet').value = id
    toggleItemDelete.style.display = 'flex'

}

const delItemBuffet = document.getElementById('form-delete-item')
delItemBuffet.addEventListener("submit", async (e)=>{
    e.preventDefault()

    const dadosForm = new FormData(delItemBuffet)

    const dados = await fetch('./controller/excluir.php', {
        method: "post",
        body: dadosForm
    })
    const resposta = await dados.json()
    
    if(resposta['error'] == false){
        toggleItemDelete.style.display = 'none'

        toastr.success(resposta['msg'], resposta['title'])

        setTimeout(()=>{
            location.reload()
        }, 3000)
        

    }else if(resposta['error'] == true){
        toggleItemDelete.style.display = 'none'

        toastr.error(resposta['msg'], resposta['title'])

        setTimeout(()=>{
            location.reload()
        }, 3000)

    }


})




async function updateItem(id){
    toggleItemUpdate.style.display = 'flex'
    
    const dados = await fetch('./controller/json-item-buffet.php?idItem='+id)
    const json_item = await dados.json()
    
    document.getElementById('editItemBuffet').value = id
    document.getElementById('editNomeItem').value = json_item['nomeItemBuffet']
    
}

const editItem = document.getElementById('edit-item-buffet')
editItem.addEventListener("submit", async (e)=>{

    e.preventDefault()

    const dadosForm = new FormData(editItem)
    const dados = await fetch('./controller/update-itemBuffet.php',{
        method: "post",
        body: dadosForm
    })
    const resposta = await dados.json()

    if(resposta['error'] == false){
        toggleItemUpdate.style.display = 'none'

        toastr.success(resposta['msg'], resposta['title'])

        setTimeout(()=>{
            location.reload()
        }, 3000)
        

    }else if(resposta['error'] == true){
        toggleItemUpdate.style.display = 'none'

        toastr.error(resposta['msg'], resposta['title'])

        setTimeout(()=>{
            location.reload()
        }, 3000)


    }

})



const insertItem = document.querySelector('#insert-item-buffet')
insertItem.addEventListener("submit", async (e)=>{
    e.preventDefault()

    const dadosForm = new FormData(insertItem)

    const dados = await fetch('./controller/insert-itemBuffet.php',{
        method: "post",
        body: dadosForm
    })

    const resposta = await dados.json()

    if(resposta['error'] == false){

        toastr.success(resposta['msg'], resposta['title'])

        setTimeout(()=>{
            location.reload()
        }, 3000)


    }else if(resposta['error'] == true){

        toastr.error(resposta['msg'], resposta['title'])

        setTimeout(()=>{
            location.reload()
        }, 3000)
        
    }


})