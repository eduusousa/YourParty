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

        toastr.success(resposta['msg'], resposta['title'])
        
        setTimeout(()=>{
            location.reload()
        }, 3000)
        

    }else if(resposta['error'] == true){
        toggleDeleteDecoracao.style.display = 'none'

        toastr.error(resposta['msg'], resposta['title'])
        
        setTimeout(()=>{
            location.reload()
        }, 3000)
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

        toastr.success(resposta['msg'], resposta['title'])

        setTimeout(()=>{
            location.reload()
        }, 3000)
        

    }else if(resposta['error'] == true){
        toggleUpdateDec.style.display = 'none'

        toastr.error(resposta['msg'], resposta['title'])

        setTimeout(()=>{
            location.reload()
        }, 3000)

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

        toastr.success(resposta['msg'], resposta['title'])

        setTimeout(()=>{
            location.reload()
        }, 3000)
        


    }else if(resposta['error'] == true){
        toggleImage.style.display = 'none'

        toastr.error(resposta['msg'], resposta['title'])

        setTimeout(()=>{
            location.reload()
        }, 3000)

    }else if(resposta['aviso'] == true){

        toastr.warning(resposta['msg'], resposta['title'])
    
    }  
})




const formInsert = document.querySelector('#insert-form-decoracao')
formInsert.addEventListener("submit", async (e)=>{
    e.preventDefault()

    const dadosForm = new FormData(formInsert)

    const dados = await fetch('./controller/insert-decoracao.php',{
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


