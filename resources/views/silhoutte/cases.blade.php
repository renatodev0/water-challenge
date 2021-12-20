@extends('layouts.head')
<div class="d-flex justify-content-center vertical-center row">
    @for ($i = 1; $i <= $cases; $i++)
    <div class="d-flex justify-content-center">
        <div class="col-md-auto px-2">
                <div class="d-flex justify-content-center">
                    <span>Caso  {{ $i }}</span><br>
                </div>
                <input class="form-control" type="text" name="length-case" id="length-case-{{$i}}" placeholder="Tamanho do Array">
                <input class="form-control mt-1" type="text" name="length-case" id="array-case-{{$i}}" placeholder="Valores ">
                <button class="btn btn-success btn-sm  mb-3 mt-1" id="case-button-{{$i}}" onclick="resultCase({{$i}})">Resultado</button>
        </div>
        <div class="col-md-auto">
            <br>
           <span> Resultado: </span>
           <span id="result-case-{{$i}}"></span>
        </div>
    </div>
    @endfor
</div>
<script>
    function resultCase(i) {
        let size = document.getElementById(`length-case-${i}`).value;
        let heights = document.getElementById(`array-case-${i}`).value;
        let arrayStr = heights.split(" ");
        let array = arrayStr.map(Number)
        if(array.length == size) {
            let holesValues = []
            const reducer = (accumulator, curr) => accumulator + curr;
            let lastValue = false
            let inHole = false
            let initHole = 0
            let endHole = 0
            let minHeightHole = 0
            let holeTotalValue = 0

            for(let x = 0, total = array.length; x < total; x++ ){
                let next = x + 1

                if(array[next] < array[x] && array[next] != array.at(-1) && !inHole ){
                    inHole = true;
                    initHole = x;
                    minHeightHole = array[x];
                }
                else if(array[x] >= array[initHole] || (!array[next]) || ( array[next] && array[x] > array[next] && array[next] == array.at(-1) )){
                    inHole = false;
                    endHole = x;
                    
                    if(array[initHole] > array[endHole]){
                        minHeightHole = array[endHole]; 
                    }
                    for(let n = initHole + 1; n < endHole; n++){
                        holeTotalValue += (minHeightHole - array[n])
                    }

                    holesValues.push(holeTotalValue)
                }
            }
            if(holesValues){
                document.getElementById(`result-case-${i}`).textContent=`${String(holesValues.reduce(reducer))}`;
            } else {
                document.getElementById(`result-case-${i}`).textContent='Não foi possível calcular o resultado.';
            }
        } else {
            alert('Os valores informados não correspondem ao tamanho do objeto');
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
</style>