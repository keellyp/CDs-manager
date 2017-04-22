// CREATE VARIABLES
var button = {};
    button.add = document.querySelector('.button-add-product');
    button.quit = document.querySelector('.form-exit');

var form = document.querySelector('.dashboard-form');

var formIsClicked = false;


// FUNCTIONS
function formShow()
{
    form.classList.remove('animation-hide');
    form.classList.add('animation-show');
    formIsClicked = true;
}
function formHide()
{
    form.classList.remove('animation-show');
    form.classList.add('animation-hide');
    formIsClicked = false;
}

// EXIT BUTTON
button.quit.addEventListener( 'click', formHide );

// ADD PRODUCTS
button.add.addEventListener( 'click', function(){
    if (formIsClicked == false)
        formShow();
    else
        formHide();
} );
