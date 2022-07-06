const toggleDeleteDecoracao = document.getElementById('toggle-delete-decoracao')
const toggleUpdateDec = document.getElementById('toggle-update-decoracao')
const toggleImage = document.getElementById('toggle-image-decoracao')

const closeDelete = document.getElementById('closeDeleteDec')
const closeUpdate = document.getElementById('closeUpdateDec')
const closeImage = document.getElementById('closeImageDec')

closeDelete.addEventListener("click", ()=>{
    toggleDeleteDecoracao.style.display = 'none'
})

closeUpdate.addEventListener("click", ()=>{
    toggleUpdateDec.style.display = 'none'
})

closeImage.addEventListener("click", ()=>{
    toggleImage.style.display = 'none'
})


function confirmDelete(self){
    toggleDeleteDecoracao.style.display = 'flex'

    const id = self.getAttribute('data-id')
    document.getElementById('excDecoracao').value = id
}

const excFormDecoracao = document.getElementById('form-delete-decoracao')
excFormDecoracao.addEventListener("submit", async (e)=>{
    e.preventDefault()

    const dadosForm = new FormData(excFormDecoracao)
    const dados = await fetch('./controller/excluir.php',{
        method: "post",
        body: dadosForm
    })

    const resposta = await dados.json()

    if(resposta['error'] == false){
        toggleDeleteDecoracao.style.display = 'none'

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
        toggleDeleteDecoracao.style.display = 'none'

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



async function updateDecoracao(id){
    toggleUpdateDec.style.display = 'flex'

    const dados = await fetch('./controller/json-decoracao.php?idDecoracao='+id)

    const json_decoracao = await dados.json()

    document.getElementById('editIdDec').value = json_decoracao['idDecoracao']
    document.getElementById('editNomeDec').value = json_decoracao['nomeDecoracao']
    document.getElementById('editValorDec').value = json_decoracao['valorDecoracao']
    document.getElementById('editTipoDec').value = json_decoracao['tipoDecoracao']
    document.getElementById('editTemaDec').value = json_decoracao['temaDecoracao']
    document.getElementById('editDescDec').value = json_decoracao['descDecoracao']

}

const editDec = document.getElementById('edit-form-decoracao')
editDec.addEventListener("submit", async (e)=>{
    e.preventDefault()

    const dadosForm = new FormData(editDec)

    const dados = await fetch('./controller/update-decoracao.php', {
        method: "post",
        body: dadosForm
    })
    const resposta = await dados.json()

    if(resposta['error'] == false){
        toggleUpdateDec.style.display = 'none'

        $(document).ready(()=>{
            $('#area-toasts').append(resposta['msg'])

            $('#toast-success').toast('show')

            $('#toast-success').on('hide.bs.toast', e=>{
                $(e.currentTarget).remove()
            })

            setTimeout(()=>{
                location.reload()
            })
        })

    }else if(resposta['error'] == true){
        toggleUpdateDec.style.display = 'none'

        $(document).ready(()=>{
            $('#area-toasts').append(resposta['show'])

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



function updateImage(self){
    toggleImage.style.display = 'flex'

    const id = self.getAttribute('data-id')
    const image = self.getAttribute('data-image')

    document.getElementById('image-atual').innerHTML = "<img src='../../"+image+"' width='180px' height='180px'>"

    document.getElementById('editIdImage').value = id
    document.getElementById('pathAtual').value = image

}

const editImage = document.getElementById('edit-image-decoracao')
editImage.addEventListener("submit", async (e)=>{
    e.preventDefault()

    const dadosForm = new FormData(editImage)

    const dados = await fetch("./controller/update-image.php",{
        method: "post",
        body: dadosForm
    })

    const resposta = await dados.json()

    if(resposta['error'] == false){
        toggleImage.style.display = 'none'

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
        toggleImage.style.display = 'none'

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

    }else if(resposta['aviso'] == true){

        $(document).ready(()=>{
            $('#aviso-toast').append(resposta['msg'])
    
            $('#toast-warning').toast('show')
    
            $('#toast-warning').on('hide.bs.toast', e=>{
                $(e.currentTarget).remove()
            })

        })
        


    
    }  
})



