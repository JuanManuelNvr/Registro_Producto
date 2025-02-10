const cbxBodega = document.getElementById('bodega')
cbxBodega.addEventListener('change',getSucursal)
cbxBodega.addEventListener('change',getMoneda)

const cbxSucursal = document.getElementById('sucursal')
const cbxMoneda = document.getElementById('moneda')

//Sucursal
function fetchAndSetData(url, formData, targetElement) {
    return fetch(url, {
        method: "POST",
        body: formData,
        mode:'cors'
    })
    .then(Response => Response.json())
    .then(data => {
        targetElement.innerHTML = data
    })
    .catch(err => console.log(err))
}

function getSucursal(){
    let Bodega = cbxBodega.value
    let url = 'getSucursal.php'
    let formData = new FormData()

    formData.append('id_bodega',Bodega)

    fetchAndSetData(url, formData, cbxSucursal)
}
//Moneda

function fetchAndSetDataMon(url, formData, targetElement) {
    return fetch(url, {
        method: "POST",
        body: formData,
        mode:'cors'
    })
    .then(Response => Response.json())
    .then(data => {
        targetElement.innerHTML = data
    })
    .catch(err => console.log(err))
}

function getMoneda(){
    let Bodega = cbxBodega.value
    let url = 'getMoneda.php'
    let formData = new FormData()

    formData.append('id_bodega',Bodega)

    fetchAndSetDataMon(url, formData, cbxMoneda)
}
