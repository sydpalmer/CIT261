const calculator = {
    num1: null,
    num2: null,
    operation: '',
    inputOutput: document.getElementById('calcInput'),
    clear: function() {
        this.inputOutput.value = '';
        this.num1 = null;
        this.num2 = null;
        this.operation = '';
    },
    buttonClicked: function (button) {
        console.log(button.innerHTML);
        let inputBox = this.inputOutput;

        switch (button.innerHTML) {
            case 'M':
                break;
            case 'C':
                this.clear();
                break;
            case '/':
                this.num1 = inputBox.value;
                this.operation = '/';
                inputBox.value = '';
                break;
            case 'X':
                this.num1 = inputBox.value;
                this.operation = 'X';
                inputBox.value = '';
                break;
            case '-':
                this.num1 = inputBox.value;
                this.operation = '-';
                inputBox.value = '';
                break;
            case '+':
                this.num1 = inputBox.value;
                this.operation = '+';
                inputBox.value = '';
                break;
            case '=':
                this.num2 = inputBox.value;
                this.doMath(this.operation);
                break;
            default:
                //if it made it to here it's a number
                if(this.operation != '' && (inputBox.value != '' && this.num2 != null)){
                    this.clear();
                    inputBox.value = button.innerHTML;
                }else{
                    inputBox.value += button.innerHTML;
                }
        }
    },
    doMath: function(operand){
        switch (operand) {
            case '/':
            if(this.num2 == "0"){
                document.getElementById('error').innerHTML = "<font color='red'>Error! Cannot divide by 0</font>";
            }else{
                var divided = parseFloat(this.num1) / parseFloat(this.num2);
                this.inputOutput.value = divided.toFixed(2);
            }                
                break;
            case 'X':
                var multiple = parseFloat(this.num1) * parseFloat(this.num2);
                this.inputOutput.value = multiple.toFixed(2);
                break;
            case '-':
                var difference = parseFloat(this.num1) - parseFloat(this.num2);
                this.inputOutput.value = difference.toFixed(2);
                break;
            case '+':
                var sum = parseFloat(this.num1) + parseFloat(this.num2);
                this.inputOutput.value = sum.toFixed(2);
                break;
        }
    }
}