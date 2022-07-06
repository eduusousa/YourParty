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

        $(document).ready(()=>{
            $('#area-toasts').append(resposta['msg'])

            $('#toast-success').toast('show')

            $('#toast-success').on('hide.bs.toast', e=>[
                $(e.currentTarget).remove()
            ])

            setTimeout(()=>{
                location.reload()
            }, 3000)
        })

    }else if(resposta['error'] == true){
        toggleItemDelete.style.display = 'none'

        $(document).ready(()=>{
            $('#area-toasts').append(resposta['msg'])

            $('#toast-error').toast('show')

            $('#toast-error').on('hide.bs.toast', e=>[
                $(e.currentTarget).remove()
            ])

            setTimeout(()=>{
                location.reload()
            }, 3000)
        })

    }


})




async function updateItem(id){
    toggleItemUpdate.style.display = 'flex'

    const dados = await fetch('./controller/json-itemBuffet.php?idItem='+id)
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

        $(document).ready(()=>{
            $('#area-toasts').append(resposta['msg'])

            $('#toast-success').toast('show')

            $('#toast-success').on('hide.bs.toast', e=>{
                $(e.currentTarget).remove()
            })


            setTimeout(()=>{
                location.reload()
            }, 3000)
        })

    }else if(resposta['error'] == true){
        toggleItemUpdate.style.display = 'none'

        $(document).ready(()=>{
            $('#area-toasts').append(resposta['msg'])

            $('#toast-error').toast('show')

            $('#toast-error').on('hide.bs.toast', e=>{
                $(e.currentTarget).remove()
            })

            setTimeout(()=>{
                location.reload()
            }, 3000)
        })


    }

})