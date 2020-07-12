$(function() {
    
    mask();

    $('#form-ebook').on('submit', function(event) {
        event.preventDefault();
        
        let dados = {
            nome: $("#name").val(),
            email: $("#email").val(),
            telefone: $("#mobile").val(),
            type_email: "e-book"
        };
        
        console.log(dados);
        
        $.ajax({
            method: "POST",
            url: "../email/service-email.php",
            data: dados,
            success(response) {
                alert(response)
            },
            fail(error) {
                alert('Erro :(')
                console.log(error)
            }
        })
    
    })

    function mask() {
        $("#mobile").mask("(00) 00000-0000")
    }
})