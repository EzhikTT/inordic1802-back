// const area = {
//     app: document.getElementById('app'),
//     paintCross: function ( id ) {
//
//         const cell = document.getElementById(id);
//
//         cell.classList.add('cross');
//
//         cell.appendChild(document.createElement('div'));
//         cell.appendChild(document.createElement('div'));
//     },
//     paintZero: function ( id ) {
//
//         const cell = document.getElementById(id);
//
//         cell.classList.add('zero');
//
//         cell.appendChild(document.createElement('div'));
//     },
//     mainChoose: 'Cross',
//     cells: [],
//     checkEnd: function () {
//
//         const self = this;
//
//         let isEnd = false;
//
//         for (let i = 0; i < this.cells.length && !isEnd; i++) {
//
//             if (
//                 i % 3 === 0 && !!this.cells[i] && !!this.cells[i + 1] && !!this.cells[i + 2] &&
//                 !!this.cells[i].value && !!this.cells[i + 1].value && !!this.cells[i + 2].value &&
//                 this.cells[i].value === this.cells[i + 1].value &&
//                 this.cells[i + 1].value === this.cells[i + 2].value
//             ) {
//
//                 isEnd = true;
//             }
//
//             if(
//                 !!this.cells[i] && !!this.cells[i + 3] && !!this.cells[i + 6] &&
//                 !!this.cells[i].value && !!this.cells[i + 3].value && !!this.cells[i + 6].value &&
//                 this.cells[i].value === this.cells[i + 3].value &&
//                 this.cells[i + 3].value === this.cells[i + 6].value
//             ){
//
//                 isEnd = true;
//             }
//
//             if(
//                 !!this.cells[i] && !!this.cells[i + 4] && !!this.cells[i + 8] &&
//                 !!this.cells[i].value && !!this.cells[i + 4].value && !!this.cells[i + 8].value &&
//                 this.cells[i].value === this.cells[i + 4].value &&
//                 this.cells[i + 4].value === this.cells[i + 8].value
//             ){
//
//                 isEnd = true;
//             }
//
//             if(
//                 i === 2 && !!this.cells[i].value && !!this.cells[i + 2].value && !!this.cells[i + 4].value &&
//                 this.cells[i].value === this.cells[i + 2].value && this.cells[i + 2].value === this.cells[i + 4].value
//             ){
//
//                 isEnd = true;
//             }
//         }
//
//         if (isEnd) {
//
//             alert('Победил игрок №' + (self.mainChoose === 'Cross' ? '1' : '2'));
//
//             this.newGame();
//         }
//     },
//     paintArea: function () {
//
//         for (let i = 0; i < 9; i++) {
//
//             this.paintCell(`cell_${i}`);
//         }
//     },
//     newGame: function () {
//
//         this.cells = this.cells.map(function(item) {
//
//             document.getElementById(item.id).classList.remove('zero');
//             document.getElementById(item.id).classList.remove('cross');
//
//             return {
//                 id: item.id,
//                 value: ''
//             };
//         });
//
//         this.mainChoose = 'Cross';
//     },
//     paintCell: function ( id = '', _class = 'cell' ) {
//
//         let cell = document.createElement('div');
//
//         cell.style.width = '100px';
//         cell.style.height = '100px';
//         cell.id = id;
//         cell.classList.add(_class);
//
//         this.cells.push({
//             id: id,
//             value: ''
//         });
//
//         const self = this;
//
//         cell.addEventListener('click', function ( event ) {
//
//             const cellIndex = self.cells.findIndex(function ( item ) {
//
//                 return item.id === event.target.id;
//             });
//
//             if (~cellIndex && !self.cells[cellIndex].value) {
//
//                 self[`paint${self.mainChoose}`](event.target.id);
//
//                 self.cells[cellIndex].value = self.mainChoose;
//
//                 // setTimeout(function ( ) {
//
//                 self.checkEnd();
//                 self.mainChoose = self.mainChoose === 'Cross' ? self.mainChoose = 'Zero' : self.mainChoose = 'Cross';
//                 // }, 100);
//             }
//         });
//
//         this.app.appendChild(cell);
//     }
// };
//
// area.paintArea();
//
// console.log(area);
//
// document.getElementById('but').addEventListener('click', function ( event ) {
//
//     console.log(document.getElementById('count').value);
// });


let lastValue = 'cross';

Vue.component(
    'cell',
    {
        props: ['id', '_class'],
        template: '<div :id="id" :class="`${_class} ${value}`" @click="setValue"></div>',
        data() {
            return {
                value: ''
            }
        },
        methods: {
            setValue(){

                if(!this.value){

                    this.value = lastValue;
                    lastValue = lastValue === 'cross' ? 'zero' : 'cross';
                }
            }
        }
    }
);


const app = new Vue({
    el: '#app'
});






