function printDiv(){
	var content = document.getElementById("main").innerHTML;
	var printWindow = window.open('','','height=200,width=400');
	printWindow.document.write('<html><head><title>Print DIV Content</title><link rel="stylesheet" type="text/css" href="new_page.css"><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">');  
    printWindow.document.write('</head><body>');  
    printWindow.document.write(content);  
    printWindow.document.write('</body></html>');  
    printWindow.document.close();  
    printWindow.print();
}