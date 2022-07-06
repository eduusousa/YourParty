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

const toggleUpdate = document.getElementById('toggle-update-seg');
const toggleDelete = document.getElementById('toggle-delete-seg');
const toggleImage = document.getElementById('toggle-image-seg');


const closeDelete = document.getElementById('btnCloseDelete');
const closeUpdate = document.getElementById('btnCloseUpdate');
const closeImage = document.getElementById('btnCloseImage');

const msgAlertImage = document.getElementById('msgAlertImage')
const msgAlertUpdate = document.getElementById('msgAlertUpdate');
const msgAlerta1 = document.getElementById('image-alert-msg');



// |-------------| EVENTOS PARA FECHAR OS MODAIS |-------------|

    closeDelete.addEventListener("click", ()=>{
        toggleDelete.style.display = 'none';
    })

    closeUpdate.addEventListener("click", ()=>{
        toggleUpdate.style.display = 'none';
    })

    closeImage.addEventListener("click", ()=>{
        toggleImage.style.display = 'none';
    })

// |-------------| ============================ |-------------|



// |-------------| EVENTOS - EXCLUSÃO DOS DADOS|-------------|
    function confirmDelete(self) {
        
        var id = self.getAttribute('data-id');
        document.getElementById('form-delete-seg').excIdSeguranca.value = id;
        toggleDelete.style.display = 'flex';  

    }

    const excForm = document.getElementById('form-delete-seg')
    excForm.addEventListener("submit", async (e) =>{
        e.preventDefault()

        const dadosForm = new FormData(excForm)

        const dados = await fetch('./controller/excluir.php',{
            method: "post",
            body: dadosForm
        })
        const resposta = await dados.json()

        if(resposta['error'] == false){
            toggleDelete.style.display = 'none'

            toastr.success(resposta['msg'], resposta['title'])

            setTimeout(()=>{
                location.reload()
            }, 4000)
            
        }else if(resposta['error'] == true){

            toggleDelete.style.display = 'none'

            toastr.error(resposta['msg'], resposta['title'])

            setTimeout(()=>{
                location.reload()
            }, 4000)


        }
    })

// |-------------| ============================ |-------------|



// |------------------------------| EVENTOS - ATUALIZAR DADOS SEGURANÇA |------------------------------|
    async function updateSeguranca(id){
        toggleUpdate.style.display = 'flex'

        const dados = await fetch('./controller/json-seguranca.php?idSeguranca='+id)
        const resposta = await dados.json()

        document.getElementById('editIdSeg').value = resposta['idSeguranca']
        document.getElementById('editNomeSeg').value = resposta['descSeguranca']
        document.getElementById('editValorSeg').value = resposta['valorSeguranca']
        document.getElementById('editQtdeSeg').value = resposta['quantidadeSeguranca']
    
    }


    const editForm = document.getElementById('edit-form-seguranca');
    editForm.addEventListener("submit", async (e) => {
        e.preventDefault();

        const dadosForm = new FormData(editForm);
        const dadosResposta = await fetch("./controller/update-seguranca.php", {
            method: "POST",
            body: dadosForm,
        })
        const resposta = await dadosResposta.json()

        if(resposta['error'] == false){
            toggleUpdate.style.display = 'none'

            toastr.success(resposta['msg'], resposta['title'])

            setTimeout(()=>{
                location.reload()
            },4000)


        } else if(resposta['error'] == true){

            toggleUpdate.style.display = 'none'

            toastr.error(resposta['msg'], resposta['title'])

            setTimeout(()=>{
                location.reload()
            },4000)

        }

    })
// |-------------| ======================================================= |-------------|



// |------------------------------| EVENTOS - ATUALIZAR IMAGEM SEGURANÇA |------------------------------|
    function updateImage(self){
        
        toggleImage.style.display = ' flex'
        const id = self.getAttribute('data-id');
        const image = self.getAttribute('data-image');

        const imagem = document.getElementById('image-update')
        imagem.innerHTML = "<img src='../../"+image+"' width='180px' height='180px'>"

        document.getElementById('editIdSeguranca').value = id
        document.getElementById('pathAtual').value = image

    }



    const editImage = document.getElementById('edit-image-seg')
 
    editImage.addEventListener("submit", async (e) =>{
        e.preventDefault()

        const dadosFormImage = new FormData(editImage);
        for (var dadosFormEdit of dadosFormImage.entries()){
            console.log(dadosFormEdit[0] + ', ' + dadosFormEdit[1])
        }

        const dadosForm = await fetch("./controller/update-image.php", {
            method: "post",
            body: dadosFormImage
        })

        const resposta = await dadosForm.json()
        


        if(resposta['error'] == false){
            toggleImage.style.display = 'none'

            toastr.success(resposta['msg'], resposta['title'])
           
            
            setTimeout(()=>{
                location.reload()
            }, 4000)
            


        } else if(resposta['error'] == true){

            toggleImage.style.display = 'none'
            
            toastr.error(resposta['msg'], resposta['title'])
            
            setTimeout(()=>{
                location.reload()
            }, 3000)


        } else if(resposta['aviso'] == true){

            toastr.warning(resposta['msg'], resposta['title'])

        }
    })










    const cadastrarSeg = document.querySelector('#enviando-dados')
    cadastrarSeg.addEventListener("submit", async (e)=>{
        e.preventDefault()

        const dadosForm = new FormData(cadastrarSeg)
        for(var teste of dadosForm.entries()){
            console.log(teste[0] + ", " + teste[1])
        }

        const dados = await fetch('./controller/insert-seguranca.php',{
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
// |-------------| ======================================================= |-------------|