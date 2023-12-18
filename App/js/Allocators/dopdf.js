import $ from 'jquery';

export default function dopdf() {
    document.getElementById('PDF').addEventListener('click', () => {
        // Crea un nuevo documento PDF
        const pdf = new jsPDF({
            orientation: 'landscape', // Establece la orientación en horizontal
        });
    
        // Título personalizado
        const title = 'ORLES';
        const fontSize = 25;
    
        // Ajusta el margen general hacia abajo
        const marginTop = 5; // Ajusta el margen según tu necesidad
    
        // Calcula la posición para centrar el texto en el ancho del documento
        const textWidth = pdf.getStringUnitWidth(title) * fontSize / pdf.internal.scaleFactor;
        const startX = (pdf.internal.pageSize.width - textWidth) / 2;
    
        pdf.setFontSize(fontSize); // Establece el tamaño de la fuente
        pdf.setFontStyle('bold'); // Establece el estilo de la fuente a negrita
    
        // Ajusta el margen entre el título y la imagen
        const titleMarginBottom = 10; // Ajusta el margen según tu necesidad
        pdf.text(title, startX, 10 + titleMarginBottom + marginTop); // Agrega el texto centrado con margen
    
        // Obtén el contenido de texto y agrégalo al PDF
        const textContent = document.getElementById('pdfContent').textContent;
        const textLines = pdf.splitTextToSize(textContent, pdf.internal.pageSize.width - 20);
        pdf.text(10, 30 + titleMarginBottom + marginTop, textLines);
    
        // Obtén la imagen del div
        const imgDiv = document.querySelector('.bg-blue-900 img'); // Ajusta el selector según la estructura de tu HTML
    
        // Calcula las coordenadas para centrar la imagen
        const imgWidth = 200; // Ajusta el ancho de la imagen según tu necesidad
        const imgHeight = 200; // Ajusta la altura de la imagen según tu necesidad
        const imgX = (pdf.internal.pageSize.width - imgWidth) / 2;
        const imgY = 45 + titleMarginBottom + marginTop; // Ajusta la posición vertical de la imagen con margen
    
        // Agrega la imagen al PDF centrada
        const imgData = getBase64Image(imgDiv);
        pdf.addImage(imgData, 'JPEG', imgX, imgY, imgWidth, imgHeight);
    
        // Guarda el PDF
        pdf.save('Orle.pdf');
    });
    
    // Función para convertir la imagen a datos base64
    function getBase64Image(img) {
        const canvas = document.createElement("canvas");
        canvas.width = img.width;
        canvas.height = img.height;
    
        const ctx = canvas.getContext("2d");
        ctx.drawImage(img, 0, 0, img.width, img.height);
    
        const dataURL = canvas.toDataURL("image/jpeg");
        return dataURL;
    }
}