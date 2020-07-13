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
            url: "../sendEmail.php",
            data: dados,
            success(response) {
                alert("Olá "+$("#name").val()+", o E-book foi enviando para o seu email, favor verificar!")
            },
            fail(error) {
                alert("Ocorreu um erro, falar com a equipe de supporte!")
                console.log(error)
            }
        })
    
    })

    function mask() {
        $("#mobile").mask("(00) 00000-0000")
    }
})