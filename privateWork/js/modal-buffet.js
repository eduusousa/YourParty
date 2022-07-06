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
        
        toastr.success(resposta['msg'], resposta['title'])

        setTimeout(()=>{
            location.reload()
        }, 2000)

    }else if(resposta['error'] == true){

        toggleDeleteBuffet.style.display = 'none'

        toastr.error(resposta['msg'], resposta['title'])

        setTimeout(()=>{
            location.reload()
        }, 2000)

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
    document.getElementById('editDescBuffet').value = json_buffet['descricaoBuffet']
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

        toastr.success(json_buffet['msg'], json_buffet['title'])

        setTimeout(()=>{
            location.reload()
        }, 2000)

  

    } else if(json_buffet['error'] == true){

        toggleUpdateBuffet.style.display = 'none'

        toastr.error(json_buffet['msg'], json_buffet['title'])

        setTimeout(()=>{
            location.reload()
        }, 2000)

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
        
        toastr.success(json_image['msg'], json_image['title'])

        setTimeout(()=>{
            location.reload()
        }, 3000)

    }else if(json_image['error'] == true){
        toggleImage.style.display = 'none'

        toastr.error('OCorreu um erro na hora de atualizar. Tente novamente mais tarde')

        setTimeout(()=>{
            location.reload()
        }, 3000)
    


    }else if(json_image['aviso'] == true){

        toastr.warning(json_image['msg'], json_image['title'])

    }

})


const insertBuffet = document.querySelector('#insert-form-buffet')
insertBuffet.addEventListener("submit", async (e)=>{
    e.preventDefault()

    const dadosForm = new FormData(insertBuffet)

    const dados = await fetch('./controller/insert-buffet.php',{
        method: 'post',
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






