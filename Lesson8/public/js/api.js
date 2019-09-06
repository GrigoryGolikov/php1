$(document).ready(function () {
    $(".buy").on('click', function () {
        let id = $(this).attr('data-id');
        (async () => {
            const response = await fetch('/api/buy/', {
                method: 'POST',
                headers: new Headers({
                    'Content-Type': 'application/json'
                }),
                body: JSON.stringify({
                    id: id
                }),
            });
            console.log(response);
            const answer = await response.json();

            $('#counter').html(answer.count);
            console.log(answer);
        })();
    });

    $(".delete").on('click', function (e) {
        let id = e.target.id;
        (async () => {
            const response = await fetch('/api/deleteFromBasket/', {
                method: 'POST',
                headers: new Headers({
                    'Content-Type': 'application/json'
                }),
                body: JSON.stringify({
                    id: id
                }),
            });
            const answer = await response.json();
            $('#item_' + answer.id).remove();
            $('#counter').html(answer.count);
            $('#summ').html(answer.summ);
            console.log(answer);
        })();
    });

    $(".accept").on('click', function (e) {
        let id = e.target.id;
        (async () => {
            const response = await fetch('/api/updateOrder/', {
                method: 'POST',
                headers: new Headers({
                    'Content-Type': 'application/json'
                }),
                body: JSON.stringify({
                    id: id,
                    status: 2
                }),
            });
            const answer = await response.json();

            $('#status'+ id).html(answer.status);
            console.log(answer.status);
        })();
    });
    $(".close").on('click', function (e) {
        let id = e.target.id;
        (async () => {
            const response = await fetch('/api/updateOrder/', {
                method: 'POST',
                headers: new Headers({
                    'Content-Type': 'application/json'
                }),
                body: JSON.stringify({
                    id: id,
                    status: 3
                }),
            });
            const answer = await response.json();

            $('#status'+ id).html(answer.status);
            console.log(answer.status);
        })();
    });

});