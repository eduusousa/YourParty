const toggleDeleteLocal = document.querySelector('#toggle-delete-local');
const toggleUpdateLocal = document.querySelector('#toggle-update-local');
const toggleImage = document.querySelector('#toggle-image-local')


const closeDelete = document.getElementById('btnCloseDelete');
const closeUpdate = document.getElementById('btnCloseUpdate');
const closeImage = document.getElementById('btnCloseImage')


// ----------------------------
function confirmDelete(self){
    const id = self.getAttribute('data-id');
    document.getElementById('form-delete-local').excIdLocal.value = id;

    toggleDeleteLocal.style.display = 'flex';
}

const excForm = document.getElementById('form-delete-local')
excForm.addEventListener("submit", async e =>{
    e.preventDefault()

    const dadosForm = new FormData(excForm)

    const dados = await fetch('./controller/excluir.php', {
        method: "POST",
        body: dadosForm
    })

    const resposta = await dados.json()

    if(resposta['error'] == false){
        toggleDeleteLocal.style.display = 'none'

        $(document).ready(()=>{


            $('#area-toasts').append(resposta['msg'])
    
            $('#toast-success').toast('show')
    
            $('#toast-success').on('hide.bs.toast', e =>{
                $(e.currentTarget).remove()
            })
    
            setTimeout(()=>{
                location.reload()
            }, 2000)

        })


    }

})

// ----------------------------

// ----------------------------
closeDelete.addEventListener("click", ()=>{
    toggleDeleteLocal.style.display = 'none';
})

closeUpdate.addEventListener("click", ()=>{
    toggleUpdateLocal.style.display = 'none';
})

closeImage.addEventListener("click", ()=>{
    toggleImage.style.display = 'none';
})
// ------------------------------
const msgAlerta = document.getElementById("update-local-msg");



async function listUpdateLocal(id){
    msgAlerta.innerHTMl = "";
    toggleUpdateLocal.style.display = 'flex';
    
    const dados = await fetch('./controller/json-local.php?idLocal='+id)
    const json_local = await dados.json()
    console.log(json_local)
    
    document.getElementById("editIdLocal").value = json_local['idLocal'];
    document.getElementById("editNomeLocal").value = json_local['nomeLocal'];
    document.getElementById("editValorLocal").value = json_local['valorLocal'];

    document.getElementById("editCepLocal").value = json_local['cepLocal'];
    document.getElementById("editEndLocal").value = json_local['enderecoLocal'];
    document.getElementById("editNumLocal").value = json_local['numeroLocal'];
    document.getElementById("editBairroLocal").value = json_local['bairroLocal'];
    document.getElementById("editCidadeLocal").value = json_local['cidadeLocal'];
    document.getElementById("editEstadoLocal").value = json_local['estadoLocal'];

}


const editLocal = document.getElementById("edit-form-local");
editLocal.addEventListener("submit", async (e) =>{
    e.preventDefault();

    const dadosForm = new FormData(editLocal);
    const dados = await fetch('./controller/update-local.php', {
        method: "POST",
        body: dadosForm
    })
    const json_resposta = await dados.json();

    if(json_resposta['error'] == false){
        toggleUpdateLocal.style.display = 'none'

        $(document).ready(()=>{

            $('#area-toasts').append(json_resposta['msg'])
    
            $('#toast-success').toast('show')
    
            $('#toast-success').on('hide.bs.toast', e =>{
                $(e.currentTarget).remove()
            })
    
            setTimeout(()=>{
                location.reload()
            }, 4000)

        })



    }else if(json_resposta['error'] == true){
        
        toggleUpdateLocal.style.display = 'none'

        $(document).ready(()=>{

            $('#area-toasts').append(json_resposta['msg'])
    
            $('#toast-error').toast('show')
    
            $('#toast-error').on('hide.bs.toast', e =>{
                $(e.currentTarget).remove()
            })
    
            setTimeout(()=>{
                location.reload()
            }, 4000)


        })

        
    }

})




function updateImageLocal(self){
    toggleImage.style.display = 'flex'
    
    const id = self.getAttribute('data-idImage');
    const image = self.getAttribute('data-image');
    console.log(image)
    
    const imagem = document.querySelector('.image-update-local')
    imagem.innerHTML = "<img src='../../"+image+"' width='180px' height='180px'>"
    document.getElementById('editIdImage').value = id
    document.getElementById('pathAtual').value = image

}

const editImage = document.getElementById("edit-image-local")
editImage.addEventListener("submit" , async (e) =>{
    e.preventDefault();

    const dadosForm = new FormData(editImage)
    for(var dadosFormEdit of dadosForm.entries()){
        console.log(dadosFormEdit[0] + ", " + dadosFormEdit[1])
    }

    const dados = await fetch('./controller/update-image.php',{
        method: "post",
        body: dadosForm
    })
    const dadosResposta = await dados.json()

    if(dadosResposta['error'] == false){
        toggleImage.style.display = 'none'

        $(document).ready(()=>{

            $('#area-toasts').append(dadosResposta['msg'])
    
            $('#toast-success').toast('show')
    
            $('#toast-success').on('hide.bs.toast', e=>{
                $(e.currentTarget).remove()
            })
    
            setTimeout(()=>{
                location.reload()
            }, 4000)


        })


    }else if(dadosResposta['error' == true]){
        toggleImage.style.display = 'none'

        $(document).ready(()=>{

            $('#area-toasts').append(dadosResposta['msg'])

            $('#toast-error').toast('show')
    
            $('#toast-error').on('hide.bs.toast', e=>{
                $(e.currentTarget).remove()
            })
    
            setTimeout(()=>{
                location.reload
            }, 4000)

        })


    } else if(dadosResposta['aviso'] == true){

        $(document).ready(()=>{

            $('#aviso-toast').append(dadosResposta['msg'])
    
            $('#toast-warning').toast('show')
    
            $('#toast-warning').on('hide.bs.toast', e=>{
                $(e.currentTarget).remove()
            })

        })

    }

} )






