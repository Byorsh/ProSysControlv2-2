patrones = {
    usuario: /^[a-zA-Z0-9]{6,20}$/,
    password: /^[a-zA-Z0-9]+$/
}

function handleSubmit() {
    let usuario = patrones.usuario.test(document.getElementById('usuario').value);
    let password = patrones.password.test(document.getElementById('password').value);

    if (document.getElementById('usuario').value != "") {
        usuario ?
            document.getElementById('advertenciaUsuario').hidden = true :
            document.getElementById('advertenciaUsuario').hidden = false;
    } else {
        document.getElementById('advertenciaUsuario').hidden = true;
    }

    (usuario && password) ?
        document.getElementById('submitButton').disabled = false :
        document.getElementById('submitButton').disabled = true;
}