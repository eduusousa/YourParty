
const formulario = document.getElementById('insert-cliente-form')
formulario.addEventListener("submit", async (e)=>{
    e.preventDefault()

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


    const dadosForm = new FormData(formulario)
    for(var dadosF of dadosForm.entries()){
        console.log(dadosF[0] + "," + dadosF[1])
    }

    const dados = await fetch('./user/insert-cliente.php', {
        method: "post",
        body: dadosForm
    })
    const resposta = await dados.json()

    if(resposta['error'] == false){
        
        toastr.options.onHidden = function(){ 
            $(document).ready(()=>{
                $('#edit-modal').fadeIn().css("display", "none");
            })

            setTimeout(()=>{
                location.reload()
            },1000)
        }

        toastr.success(resposta['msg'], resposta['title'])

    }else if(resposta['error'] == true){

        toastr.error(resposta['msg'], resposta['title'])

    }else if(resposta['aviso'] == true){

        toastr.warning(resposta['msg'], resposta['title'])

    }

    
})


const formularioEmpresa = document.getElementById('insert-empresa-form')
formularioEmpresa.addEventListener("submit", async (e)=>{
    e.preventDefault()

    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-left",
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

    const dadosForm = new FormData(formularioEmpresa)
    for(var dadosF of dadosForm.entries()){
        console.log(dadosF[0] + "," + dadosF[1])
    }

    const dados = await fetch('./work/insert-empresa.php', {
        method: "post",
        body: dadosForm
    })
    const resposta = await dados.json()
    
    if(resposta['error'] == false){
        toastr.options.onHidden = function(){ 
            $(document).ready(()=>{
                $('#edit-modal1').fadeIn().css("display", "none");
            })

            setTimeout(()=>{
                location.reload()
            },1000)
        }

        toastr.success(resposta['msg'], resposta['title'])

    } else if(resposta['error'] == true){

        toastr.error(resposta['msg'], resposta['title'])

    }else if(resposta['aviso'] == true){

        toastr.warning(resposta['msg'], resposta['title'])
    
    }

})


