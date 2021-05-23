<div style="width: 150px;float: left; font-size: 14px">
    <input id="btnPrint" type="button" value="Print this page" onclick="printPage()"/>
</div>

<script type="text/javascript">
    function printPage() {
        var printButton = document.getElementById("btnPrint");
        printButton.style.visibility = 'hidden';
        window.print();
        printButton.style.visibility = 'visible';
    }
</script>
