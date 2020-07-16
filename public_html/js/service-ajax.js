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

    $('#form-contact').on('submit', function(event) {
        event.preventDefault();
        
        let dados = {
            nome: $("#name-contact").val(),
            email: $("#email-contact").val(),
            msg: $("#msg-contact").val(),
            type_email: "contato"
        };
        
        console.log(dados);
        
        $.ajax({
            method: "POST",
            url: "../sendEmail.php",
            data: dados,
            success(response) {
                alert("Sua menssagem foi enviada com sucesso!")
            },
            fail(error) {
                alert("Ocorreu um erro, falar com a equipe de supporte!")
                console.log(error)
            }
        })
    
    })

    $('#form-plano').on('submit', function(event) {
        event.preventDefault();

        var plano;
        var valor;
        var desconto;

        tipo_plano = $("#tipo-plano").val();

        if (tipo_plano == 1) {
            plano = "MENSAL";
            valor = "R$ 120,00";
            desconto = "Sem desconto na adesão do plano.";
        } else if (tipo_plano == 2) {
            plano = "TRIMESTRAL";
            valor = "R$ 324,00";
            desconto = "10% de desconto na adesão do plano.";
        } else if(tipo_plano == 3) {
            plano = "SEMESTRAL";
            valor = "R$ 612,00";
            desconto = "15% de desconto na adesão do plano.";
        }
        
        let dados = {
            plano : plano,
            valor : valor,
            desconto : desconto,
            nome: $("#nome-plano").val(),
            email: $("#email-plano").val(),
            telefone: $("#telefone-plano").val(),
            peso: $("#peso-plano").val(),
            altura: $("#altura-plano").val(),
            msg: $("#msg-plano").val(),
            type_email: "plano"
        };
        
        console.log(dados);
        
        $.ajax({
            method: "POST",
            url: "../sendEmail.php",
            data: dados,
            success(response) {
                alert("Sua menssagem foi enviada com sucesso!")
            },
            fail(error) {
                alert("Ocorreu um erro, falar com a equipe de supporte!")
                console.log(error)
            }
        })
    
    })


    function mask() {
        $("#mobile").mask("(00) 00000-0000");
        $("#telefone-plano").mask("(00) 00000-0000");
    }
})