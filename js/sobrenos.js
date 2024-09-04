let alunos = [
    { id: 1, nome: "an", foto: "./img/alunos/NI.png", dataNascimento: "--/--/----" },
    { id: 2, nome: "an", foto: "./img/alunos/NI.png", dataNascimento: "--/--/----" },
    { id: 3, nome: "an", foto: "./img/alunos/.jpg", dataNascimento: "30/10/2006" },
    { id: 4, nome: "an", foto: "./img/alunos/.jpg", dataNascimento: "21/05/2007" },
    { id: 5, nome: "an", foto: "./img/alunos/.jpg", dataNascimento: "07/05/2007" },
    { id: 6, nome: "an", foto: "./img/alunos/.jpg", dataNascimento: "27/09/2006" },
    { id: 7, nome: "an", foto: "./img/alunos/.jpg", dataNascimento: "24/02/2006" },
    { id: 8, nome: "an", foto: "./img/alunos/.png", dataNascimento: "25/11/2006" },
   
];


// Seleciona o contêiner onde os alunos serão exibidos
let container = document.getElementById("alunosContainer");

// Gera o HTML para cada aluno
alunos.forEach(function(aluno) {
    container.innerHTML += `
        <a href="#" class="aluno" data-id="${aluno.id}">
            <img src="${aluno.foto}" alt="${aluno.nome}" style="width: 25px; height: 25px; object-fit: cover;">
            ${aluno.nome}
        </a>
    `;
});

// Seleciona o modal e seus elementos
const modal = document.getElementById("modal");
const modalFoto = document.getElementById("modalFoto");
const modalNome = document.getElementById("modalNome");
const modalInfo = document.getElementById("modalInfo");
const closeButton = document.querySelector(".close-button");

// Função para abrir o modal com informações do aluno
function abrirModal(aluno) {
    modalFoto.src = aluno.foto;
    modalNome.textContent = aluno.nome;
    modalInfo.textContent = `Data de Nascimento: ${aluno.dataNascimento}`;
    modal.style.display = "flex";
}

// Adiciona o evento de clique aos links dos alunos
document.querySelectorAll("#alunosContainer a").forEach(function(link) {
    link.addEventListener("click", function(event) {
        event.preventDefault(); // Previne a ação padrão do link
        const alunoId = this.getAttribute("data-id");
        const aluno = alunos.find(a => a.id == alunoId);
        abrirModal(aluno);
    });
});

// Fecha o modal ao clicar no botão de fechar
closeButton.addEventListener("click", function() {
    modal.style.display = "none";
});

// Fecha o modal ao clicar fora do conteúdo
window.addEventListener("click", function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
});