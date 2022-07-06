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


const toggleDelete = document.getElementById('toggle-delete-itemDec')
const toggleUpdate = document.getElementById('toggle-update-item')

const closeDelete = document.getElementById('closeDeleteItem')
const closeUpdate = document.getElementById('closeUpdateItem')

closeDelete.addEventListener("click", () => {
    toggleDelete.style.display = 'none'
})

closeUpdate.addEventListener("click", () => {
    toggleUpdate.style.display = 'none'
})

function confirmDelete(self) {

    toggleDelete.style.display = 'flex'
    const id = self.getAttribute('data-id')
    document.getElementById('delete-itemDec').excItem.value = id

}

const excItemDec = document.getElementById('delete-itemDec')
excItemDec.addEventListener("submit", async (e) => {
    e.preventDefault()

    const dadosForm = new FormData(excItemDec)

    const dados = await fetch('./controller/excluir.php', {
        method: "post",
        body: dadosForm
    })
    const resposta = await dados.json()

    if (resposta['error'] == false) {
        toggleDelete.style.display = 'none'

        toastr.success(resposta['msg'], resposta['title'])

        setTimeout(() => {
            location.reload()
        }, 3000)


    } else if (resposta['error'] == true) {
        toggleDelete.style.display = 'none'
        
        toastr.error(resposta['msg'], resposta['title'])

        setTimeout(() => {
            location.reload()
        }, 3000)    

    }

})




async function updateItem(id) {
    toggleUpdate.style.display = 'flex'
    
    const dados = await fetch('./controller/json-item-decoracao.php?idItem=' + id)
    const json_item = await dados.json()
    
    document.getElementById('editIdItem').value = id
    document.getElementById('editNomeItem').value = json_item['nomeItemDecoracao']
}


const editForm = document.getElementById('edit-form-item')
editForm.addEventListener("submit", async (e) => {
    e.preventDefault()

    const dadosForm = new FormData(editForm)
    const dados = await fetch('./controller/update-itemDecoracao.php', {
        method: "post",
        body: dadosForm
    })

    const json_resposta = await dados.json()

    if (json_resposta['error'] == false) {
        toggleUpdate.style.display = 'none'

        toastr.success(json_resposta['msg'], json_resposta['title'])

        setTimeout(() => {
            location.reload()
        }, 3000)

    } else if( json_resposta['error'] == true){
        toggleUpdate.style.display = 'none'

        toastr.error(json_resposta['msg'], json_resposta['title'])

        setTimeout(() => {
            location.reload()
        }, 3000)


    }

})


const insertItem = document.querySelector('#insert-item')

insertItem.addEventListener("submit", async (e)=>{
    e.preventDefault()

    const dadosForm = new FormData(insertItem)

    const dados = await fetch('./controller/insert-itemDecoracao.php',{
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
