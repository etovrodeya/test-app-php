//Общая функция
function cleanTable(url) {
    $(url).empty();
}
//Первое задание
function getFib() {
    $.ajax({
            type:'GET',
            url: 'firstTask/getFibonacci.php',
            success: function(data) {
                $('tbody#fibContent').empty();
                var responce = JSON.parse(data);
            for (var i = 0; i < responce.length; i++) {
                $('tbody#fibContent').append('<tr id="fib' + (i+1) + '">')
                $('tr#fib' + (i+1)).append('<td>' + (i+1) + '</td>')
                $('tr#fib' + (i+1)).append('<td>' + responce[i] + '</td>')
            }
        }
})}
//Второе задание
function addAuthor() {
    $.post(
        "secondTask/addAuthor.php",
        {
            'firstname' : $("#firstname").val(),
            'lastname' : $("#lastname").val()
        },
        function() {
            alert('Запись добавлена');
        }
    );
}
function addBooks() {
    var authors = $('select option:selected').map(function() {
        return this.value
    }).get()
    $.post(
        "secondTask/addBooks.php",
        {
            'title': $("#title").val(),
            'authors': authors
        },
        function() {
            alert('Запись добавлена');
        }
    );
}
function getAuthors(count) {
    $.get
    (
        'secondTask/getAuthors.php',
        function(data) {
            var responce = JSON.parse(data);
            for (var g = 0; g < count; g++) {
                $('<select>',
                    {
                        id: 'author'+ g,
                        class: 'form-control'
                    }
                )
                .appendTo('#authors')
                responce.forEach(e=>{
                    $('<option>',
                        {
                            id: e.id,
                            value: e.id,
                            text: e.firstname + ' ' + e.lastname
                        }
                    )
                    .appendTo('#author' + g)
                })
            }
        }
    )
}
function setAuthors() {
    $('select').remove()
    getAuthors($("#authorsCount").val())
}
function getAuthorsWithLowCountBooks() {
    $.ajax({
            type:'GET',
            url: 'secondTask/getAuthorsWithLowCountBooks.php',
            success: function(data) {
                $('tbody#content').empty();
                var responce = JSON.parse(data);
            for (var i = 0; i < responce.length; i++) {
                $('tbody#content').append('<tr id='+i+'>')
                $('tr#'+i).append('<td>'+responce[i].firstname+'</td>')
                $('tr#'+i).append('<td>'+responce[i].lastname+'</td>')
                if (responce[i]['COUNT(*)']) {
                    $('tr#'+i).append('<td>'+responce[i]['COUNT(*)']+'</td>')
                } else {
                    $('tr#'+i).append('<td>0</td>')
                }
            }
        }
    })
}
//Третье задание       
function getSquares(url) {
    $.ajax({
            type:'GET',
            url: url,
            success: function(data) {
                $('tbody#squaresContent').empty();
                var responce = JSON.parse(data);
            for (var i = 0; i < responce.length; i++) {
                $('tbody#squaresContent').append('<tr id="squares' + i + '">')
                $('tr#squares' + i).append('<td>' + responce[i]['Сторона'] + '</td>')
                $('tr#squares' + i).append('<td>' + responce[i]['Площадь'] + '</td>')
            }
        }
    })
}
function getTringles(url) {
    $.ajax({
            type:'GET',
            url: url,
            success: function(data) {
                $('tbody#tringlesContent').empty();
                var responce = JSON.parse(data);
            for (var i = 0; i < responce.length; i++) {
                $('tbody#tringlesContent').append('<tr id="tringles' + i + '">')
                $('tr#tringles' + i).append('<td>' + responce[i]['Сторона A'] + '</td>')
                $('tr#tringles' + i).append('<td>' + responce[i]['Сторона B'] + '</td>')
                $('tr#tringles' + i).append('<td>' + responce[i]['Сторона C'] + '</td>')
                $('tr#tringles' + i).append('<td>' + responce[i]['Угол'] + '</td>')
                $('tr#tringles' + i).append('<td>' + responce[i]['Площадь'] + '</td>')
            }
        }
    })
}
function getCircles(url) {
    $.ajax({
            type:'GET',
            url: url,
            success: function(data) {
                $('tbody#сirclesContent').empty();
                var responce = JSON.parse(data);
            for (var i = 0; i < responce.length; i++) {
                $('tbody#сirclesContent').append('<tr id="сircles' + i + '">')
                $('tr#сircles' + i).append('<td>' + responce[i]['Радиус'] + '</td>')
                $('tr#сircles' + i).append('<td>' + responce[i]['Площадь'] + '</td>')
            }
        }
    })
}        