import $ from 'jquery';
import jsPDF from 'jspdf';

export default function dopdf() {
    document.getElementById('generarPdf').addEventListener('click', function() {
        const element = document.querySelector('.orla');

        if (element) {
            html2pdf(element);
        } else {
            console.error('No se pudo encontrar el elemento con la clase "orla".');
        }
    });
}
