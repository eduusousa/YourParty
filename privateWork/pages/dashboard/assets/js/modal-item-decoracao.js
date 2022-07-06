const toggleDelete = document.getElementById('toggle-delete-itemDec')
const toggleUpdate = document.getElementById('toggle-update-item')

const closeDelete = document.getElementById('closeDeleteItem')
const closeUpdate = document.getElementById('closeUpdateItem')

closeDelete.addEventListener("click", ()=>{
    toggleDelete.style.display = 'none'
})

closeUpdate.addEventListener("click", ()=>{
    toggleUpdate.style.display = 'none'
})

function confirmDelete(self){
    
    toggleDelete.style.display = 'flex'
    const id = self.getAttribute('data-id')
    document.getElementById('delete-itemDec').excItem.value = id
    
}

const excItemDec = document.getElementById('delete-itemDec')
excItemDec.addEventListener("submit", async (e)=>{
    e.preventDefault()

    const dadosForm = new FormData(excItemDec)

    const dados = await fetch('./controller/excluir.php', {
        method: "post",
        body: dadosForm
    })
    const resposta = await dados.json()

    if(resposta['error'] == false){
        toggleDelete.style.display = 'none'

        $(document).ready(()=>{
            $('#area-toasts').append(resposta['msg'])

            $('#toast-success').toast('show')

            $('#toast-success').on('hide.bs.toast',e=>{
                $(e.currentTarget).remove()
            })

            setTimeout(()=>{
                location.reload()
            }, 3000)
        


        })


        
    }else if(resposta['error'] == true){
        toggleDelete.style.display = 'none'

        $(document).ready(()=>{
            $('#area-toasts').append(resposta['msg'])

            $('#toast-error').toast('show')

            $('#toast-error').on('hide.bs.toast',e=>{
                $(e.currentTarget).remove()
            })

            setTimeout(()=>{
                location.reload()
            }, 3000)
        


        })


    }

})




async function updateItem(id){
    toggleUpdate.style.display = 'flex'

    const dados = await fetch('./controller/json-item.php?idItem='+id)

    const json_item = await dados.json()

    document.getElementById('editIdItem').value = id
    document.getElementById('editNomeItem').value = json_item['nomeItemDecoracao']
}

const editForm = document.getElementById('edit-form-item')
editForm.addEventListener("submit", async (e)=>{
    e.preventDefault()

    const dadosForm = new FormData(editForm)
    const dados = await fetch('./controller/update-itemDecoracao.php',{
        method: "post",
        body: dadosForm
    })

    const json_resposta = await dados.json()
   
    if(json_resposta['error'] == false){
        toggleUpdate.style.display = 'none'

        $(document).ready(()=>{
            $('#area-toasts').append(json_resposta['msg'])

            $('#toast-success').toast('show')

            $('#toast-success').on('hide.bs.toast', e=>{
                $(e.currentTarget).remove()
            })


            setTimeout(()=>{
                location.reload()
            }, 3000)
        })


        
    }

})
