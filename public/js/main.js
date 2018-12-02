var json;
// Función para crear los enlaces hacias los items.
var makeRender = function (item) {
    return `
        <a class="col-xs-12 col-sm-6 col-md-3 col-lg-3 categoria" href="/item/${item.id}">
            <div>
                ${item.name}
            </div>
            <div>
                <i>
                    <strong>${item.category}</strong>
                </i>
            </div>
            <div class="picture">
                <img src="${item.img}" class="img-fluid rounded-circle" alt="Logo">
            </div>
        </a>
    `
}

// Función para crear la lista de items.
var renderHtml = function (obj) {
    var render = ''
    // Recorre la lista de elementos para crear el enlace.
    $.each(obj, function (i, item) {
        render += makeRender(item)
    })
    // Renderiza la lista en el DOM.
    $('#items').html(render)
}

// Agregar el evento a los botones para filtrar los items segun su categoria.
$('body').on('change', '[name="options"]', function () {
    // Obtiene el valor de la categoria.
    var value = $(this).val()
    // Obtengo la lista de items filtrados.
    $.ajax({
        url: '/filtro/' + value, // Url para filtrar los items.
        dataType: 'json',
        beforeSend: function(){
            $('#items').html(`
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><br>
                    <div class="alert alert-info text-center" role="alert">
                        Cargando
                    </div>
                </div>`)
        }
    })
    .done(function (data) {
        json = data
        renderHtml(json) // Crea la lista con todos los elementos.
    })
})