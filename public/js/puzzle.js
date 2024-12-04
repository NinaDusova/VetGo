let puzzle;
class Puzzle {
    constructor(size, imageURL) {
        this.gridSize = size;
        this.totalTiles = this.gridSize * this.gridSize;
        this.tiles = [];
        this.emptyTileIndex = this.totalTiles - 1;
        this.imageURL = imageURL;
        this.puzzleContainer = document.getElementById('puzzle-container');
        this.initializePuzzle();
    }

    initializePuzzle() {
        this.generateTiles();
        this.renderPuzzle();
    }

    generateTiles() {
        this.tiles = Array.from({ length: this.totalTiles - 1 }, (_, i) => {
            return {
                id: i + 1,
                picUrl: `${this.imageURL}/${i + 1}.jpg`
            };
        });
        this.tiles.push(null);
        this.emptyTileIndex = this.totalTiles - 1;
    }

    renderPuzzle() {
        this.puzzleContainer.innerHTML = '';
        this.puzzleContainer.style.gridTemplateColumns = `repeat(${this.gridSize}, 1fr)`;
        this.puzzleContainer.style.gridTemplateRows = `repeat(${this.gridSize}, 1fr)`;

        this.tiles.forEach((tile, index) => {
            const tileElement = document.createElement('div');
            tileElement.className = 'tile';

           //const row = Math.floor(index / this.gridSize);
           // const col = index % this.gridSize;

            if (tile === null) {
                tileElement.classList.add('empty');
                tileElement.style.background = 'white';
            } else {
                tileElement.style.backgroundImage = `url(${tile.picUrl})`;
                tileElement.style.backgroundSize = 'cover';
                tileElement.style.backgroundPosition = 'center';

                tileElement.addEventListener('click', () => this.moveTile(index));
            }
            this.puzzleContainer.appendChild(tileElement);
        });
    }

    shuffle() {
        for (let i = this.tiles.length - 1; i > 0; i--) {
            const j = Math.floor(Math.random() * (i + 1));
            [this.tiles[i], this.tiles[j]] = [this.tiles[j], this.tiles[i]];
        }
        this.emptyTileIndex = this.tiles.indexOf(null);
        this.renderPuzzle();
    }

    moveTile(tileIndex) {
        const validMoves = [
            this.emptyTileIndex - this.gridSize,
            this.emptyTileIndex + this.gridSize,
            this.emptyTileIndex - 1,
            this.emptyTileIndex + 1
        ];

        if (validMoves.includes(tileIndex) && this.isAdjacent(tileIndex)) {
            [this.tiles[this.emptyTileIndex], this.tiles[tileIndex]] = [this.tiles[tileIndex], this.tiles[this.emptyTileIndex]];
            this.emptyTileIndex = tileIndex;
            this.renderPuzzle();
            this.checkWin();
        }
    }

    isAdjacent(tileIndex) {
        const emptyRow = Math.floor(this.emptyTileIndex / this.gridSize);
        const emptyCol = this.emptyTileIndex % this.gridSize;
        const tileRow = Math.floor(tileIndex / this.gridSize);
        const tileCol = tileIndex % this.gridSize;

        return Math.abs(emptyRow - tileRow) + Math.abs(emptyCol - tileCol) === 1;
    }

    checkWin() {
        const isSolved = this.tiles.every((tile, index) => {
            if (tile === null) {
                return index === this.tiles.length - 1;
            }
            return tile.id === index + 1;
        });

        if (isSolved) {
            alert('Congratulations! You solved the puzzle!');
        }
    }

    reset() {
        this.tiles = [];
        this.emptyTileIndex = this.totalTiles - 1;
        this.initializePuzzle();
    }
}

const imageURL = 'images/puzzle/1/';
window.onload = function() {
    puzzle = new Puzzle(4, imageURL);
};
