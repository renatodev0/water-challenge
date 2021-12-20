@extends('layouts.head')
<div class="d-flex justify-content-center vertical-center">
    <form action="{{ route('cases.init') }}" method="post" id="form">
        @csrf
        <div class="form-group text-center row">
            <label for="caseNumber" class="mb-2 display-6"> Quantos casos você quer inserir? </label>
            <div class="col-md-4">
            </div>
            <div class="col-md-auto">
                <input type="number" class="form-control mb-2 text-center" id="caseNumber" name="totalCases" placeholder="N° Casos">
                <small id="caseWarn" class="text-danger">O valor precisa estar entre 1 e 100</small><br>
                <button type="submit" onclick="validateAndSubmit(event)" class="btn btn-success mt-2">Iniciar</button>
            </div>

        </div>
    </form>
</div>
<script>
    function validateAndSubmit(e){
        e.preventDefault();
        let caseNumber = document.getElementById("caseNumber").value;
        if(caseNumber >= 1 && caseNumber < 100 ) {
            document.getElementById("form").submit();
        } else {
            document.getElementById("caseWarn").style.display = "block";
            var element = document.getElementById("caseNumber");
            element.classList.add("is-invalid");
        }
    }
</script>
<style scoped>

.vertical-center{
    min-height: 100%;
    min-height: 100vh;

    display: flex;
    align-items: center;

    background-color: #1b444b;

    color: white;
}
#caseWarn{
    display: none;
}
</style>