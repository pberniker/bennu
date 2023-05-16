var BASE_URL = 'http://localhost:89/users';

/********************************
 * QUESTION 1.
 *******************************/
function executeQ1() {
    $.ajax({
        url: BASE_URL + '/root' ,
        type: 'GET',
        success: function(data) {
            $('#my-name').html(data.name);
        },
        error: function(request, status, error) {
            console.clear();
            console.error(error);
        }     
    });
}

/********************************
 * QUESTION 2.
 *******************************/
var listItems = [
    'Settings',
    'Customer Support',
    'On Demand',
    'Search',
    'Widgets'
];

function executeQ2() {
    listItems.forEach(function(e) {
        $('#q2-list').append('<li>' + e + '.</li>');
    });
}

/********************************
 * QUESTION 3.
 *******************************/
function Person() {
    var name = '';

    this.setName = function(n) {
        name = n;
    };

    this.getName = function() {
        return name;
    }
}

function executeQ3() {
    var scott = new Person()
    scott.setName('Scott');

    var matt = new Person()
    matt.setName('Matt');

    var people = [
        scott,
        matt
    ];

    people.forEach(function(e) {
        $('#q3-list').append('<li>' + e.getName() + '.</li>');
    });
}

/********************************
 * QUESTION 4.
 *******************************/
$.fn.serializeObject = function() {
    var o = {};
    var a = this.serializeArray();

    $.each(a, function() {
        if (o[this.name]) {
            if (!o[this.name].push) {
                o[this.name] = [o[this.name]];
            }
            o[this.name].push(this.value || '');
        } else {
            o[this.name] = this.value || '';
        }
    });

    return o;
};

printQuantity();

function printQuantity() {
    $.ajax({
        url: BASE_URL + '/quantity', 
        type: 'GET',
        success: function(data) {
            $('#users-count').html(data.count);
        },
        error: function(request, status, error) {
            console.clear();
            console.error(error);
        }     
    });
}

$('#createBtn').on('click', function() {
    $('.confirmation').hide();
    $('.error').hide();

    var data = $('form').serializeObject();

    $.ajax({
        url: BASE_URL, 
        type: 'POST',
        data: data,
        dataType: 'json',
        success: function(data) {
            printQuantity();
            $('.confirmation').show();
            $('form')[0].reset();
            executeQ5();
        },
        error: function(xhr, textStatus, error) {
            var data = JSON.parse(xhr.responseText);

            if (xhr.status == 400) {
                var fields = [
                    'name',
                    'username',
                    'email',
                    'street',
                    'suite',
                    'city',
                    'zipcode',
                    'lat',
                    'lng',
                    'phone',
                    'website',
                    'company',
                    'catchPhrase',
                    'bs'
                ]

                fields.forEach(function(e) {
                    if (data[e]) {                                                
                        showError(e + 'Error', data[e][0]);
                    }
                });

                return;
            }

            showError('error', data.message);
        }     
    });
});

function showError(id, message) {
    var field = $('#' + id);
    $(field).html(message);
    $(field).show();
}

/********************************
 * QUESTION 5.
 *******************************/
function executeQ5() {
    $('#q5-answer').html('');

    $.ajax({
        url: BASE_URL, 
        type: 'GET',
        success: function(data) {
            var ul = $('<ul>');

            data.forEach(function(e) {
                ul.append('<li>' + e.name + '.</li>');
            });

            $('#q5-answer').append(ul);
        },
        error: function(request, status, error) {
            console.clear();
            console.error(error);
        }     
    });
}
