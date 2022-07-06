const toggleDeleteBuffet = document.getElementById('toggle-delete-buffet');

const closeDelete = document.getElementById('closeDeleteBuffet')
const closeUpdate = document.getElementById('closeUpdateBuffet')
const closeImage = document.getElementById('btnCloseImage')


closeDelete.addEventListener("click", ()=>{
    toggleDeleteBuffet.style.display = 'none'
})

closeUpdate.addEventListener("click", ()=>{
    toggleUpdateBuffet.style.display = 'none';
})

closeImage.addEventListener("click", ()=>{
    toggleImage.style.display = 'none'
})


function confirmDelete(self){
    
    const id = self.getAttribute('id')
    document.getElementById('form-delete-buffet').excIdBuffet.value = id
    toggleDeleteBuffet.style.display = 'flex';
}

const excFormBuffet = document.getElementById('form-delete-buffet')
excFormBuffet.addEventListener("submit", async (e)=>{
    e.preventDefault()

    const dadosForm = new FormData(excFormBuffet)
    const dados = await fetch('./controller/excluir.php', {
        method: "post",
        body: dadosForm
    })
    const resposta = await dados.json()
    
    if(resposta['error'] == false){
        toggleDeleteBuffet.style.display = 'none'

        $('#area-toasts').append(resposta['msg'])

        $('#toast-success').toast('show')

        $('#toast-success').on('hide.bs.toast', e=>{
            $(e.currentTarget).remove()
        })

        setTimeout(()=>{
            location.reload()
        }, 4000)

    }

})

// -------------

const toggleUpdateBuffet = document.getElementById('toggle-update-buffet');

async function listUpdateBuffet(id){
    toggleUpdateBuffet.style.display = 'flex'
    const dadosBuffet = await fetch('./controller/json-buffet.php?idBuffet='+id)

    const json_buffet = await dadosBuffet.json()

    document.getElementById('editIdBuffet').value = json_buffet['idBuffet']
    document.getElementById('editNomeBuffet').value = json_buffet['nomeBuffet']
    document.getElementById('editDescBuffet').innerHTML = json_buffet['descricaoBuffet']
    document.getElementById('editValorBuffet').value = json_buffet['valorBuffet']

}

const editBuffet = document.getElementById('edit-form-buffet')
editBuffet.addEventListener("submit", async (e)=>{
    e.preventDefault();

    const dadosForm = new FormData(editBuffet)
    const dados = await fetch('./controller/update-buffet.php',{
        method: "post",
        body: dadosForm
    })

    const json_buffet = await dados.json()
    if(json_buffet['error'] == false){
        toggleUpdateBuffet.style.display = 'none'

        $(document).ready(()=>{

            $('#area-toasts').append(json_buffet['msg'])

            $('#toast-success').toast('show')

            $('#toast-success').on('hide.bs.toast', e=>{
                $(e.currentTarget).remove()
            })

            setTimeout(()=>{
                location.reload()
            }, 3000)

        })


    }else if(json_buffet['error'] == true){
        toggleUpdateBuffet.style.display = 'none'

        $(document).ready(()=>{
            $('#area-toasts').append(json_buffet['msg'])

            $('#toast-error').toast('show')

            $('#toast-error').on('hide.bs.toast', e=>{
                $(e.currentTarget).remove()
            })

            setTimeout(()=>{
                location.reload()
            },3000)
        })

    }
})

// -------------

const toggleImage = document.getElementById('toggle-image-update')

function updateImage(self){
    toggleImage.style.display = 'flex'

    const id = self.getAttribute('data-id')
    const image = self.getAttribute('data-image')
    document.getElementById('image-atual').innerHTML = "<img src='../../"+image+"' width='180px' height='180px'>"

    document.getElementById('editIdImage').value = id
    document.getElementById('pathAtual').value = image

}

const editImage = document.getElementById('edit-image-buffet')
editImage.addEventListener("submit", async (e)=>{
    e.preventDefault()

    const dadosForm = new FormData(editImage)
    // for(var dadosFormImage of dadosForm.entries()){
    //     console.log(dadosFormImage[0] + ', ' + dadosFormImage[1])
    // }

    const dados = await fetch('./controller/update-image.php',{
        method: "post",
        body: dadosForm
    })
    const json_image = await dados.json()

    if(json_image['error'] == false){
        toggleImage.style.display = 'none'
        
        $(document).ready(()=>{
            $('#area-toasts').append(json_image['msg'])

            $('#toast-success').toast('show')

            $('#toast-success').on('hide.bs.toast', e=>[
                $(e.currentTarget).remove()
            ])

            setTimeout(()=>{
                location.reload()
            }, 3000)
        })

    }else if(json_image['error'] == true){
        toggleImage.style.display = 'none'

        $(document).ready(()=>{
            $('#area-toasts').append(json_image['msg'])

            $('#toast-error').toast('show')

            $('#toast-error').on('hide.bs.toast', e=>{
                $(e.currentTarget).remove()
            })

            setTimeout(()=>{
                location.reload()
            }, 3000)
        })


    }else if(json_image['aviso'] == true){
        $(document).ready(()=>{
            $('#aviso-toast').append(json_image['msg'])

            $('#toast-warning').toast('show')

            $('#toast-warning').on('hide.bs.toast', e=>{
                $(e.currentTarget)
            })

        })


    }




})




// --- item
