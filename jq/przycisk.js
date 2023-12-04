$(document).ready(function(){
    $('#przyciskJQ').click(function(){
        var kolory = ['red', 'blue', 'green', 'orange', 'purple']; // kolory do zmieniania
        var losowyKolor = kolory[Math.floor(Math.random() * kolory.length)]; // Losowanie
        $('body').css('background-color', losowyKolor); // Zmiana koloru przycisku
        setTimeout(() => {
            $('body').css('background-color', ''); // Przywrócenie pierwotnego koloru 
        }, 5000);
    });
});