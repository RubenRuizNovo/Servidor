document.getElementById("boton").addEventListener('click',mostrarDatos);

function mostrarDatos() {
    const xhttp = new XMLHttpRequest();
    xhttp.open('GET','tablaconjson.json',true);
    xhttp.send();
    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            let datos = JSON.parse(this.responseText);
            let tabla = document.getElementById('tabla');
            tabla.innerHTML= '';
            
            for(let item of datos) {
                tabla.innerHTML += `
                <tr>
                <td>${item.titulo}</td>
                <td>${item.artista}</td>
                </tr>
                `
            }
        }
    }
}