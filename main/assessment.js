//schimba culoarea la navbar cand dai scroll

window.addEventListener('scroll', ()=>{
    document.querySelector('nav').classList.toggle('window-scroll',window.scrollY>0)
})

//pentru dispozitivele mai mici, cand apesi pe alea trei linii sa ti apara navbar ul
const menu=document.querySelector(".nav_menu");
const menuBtn=document.querySelector("#open-menu-btn");
const closeBtn=document.querySelector("#close-menu-btn");

menuBtn.addEventListener('click',()=>{
    menu.style.display="flex";
    closeBtn.style.display="inline-block";
    menuBtn.style.display="none";
})

const closeNav=()=>{
    menu.style.display="none";
    closeBtn.style.display="none";
    menuBtn.style.display="inline-block";
}
closeBtn.addEventListener('click',closeNav)


//ala nou
// Function to show the modal popup
let currentEditingCard = null;

function showPopup() {
    const modal = document.getElementById('cardModal');
    modal.style.display = 'block';
}

// Function to handle changes in the card type dropdown
function handleCardTypeChange() {
    const cardType = document.getElementById('cardType').value;
    const pdfFields = document.getElementById('pdfFields');
    const newFileFields = document.getElementById('newFileFields');

    if (cardType === 'pdf') {
        pdfFields.style.display = 'block';
        newFileFields.style.display = 'none';
    } else {
        pdfFields.style.display = 'none';
        newFileFields.style.display = 'block';
    }
}

// Function to save or update a card
function saveCard() {
    const cardType = document.getElementById('cardType').value;

    if (currentEditingCard) {
        // Update existing card
        if (cardType === 'pdf') {
            const title = document.getElementById('pdfTitle').value;
            const pdfFile = document.getElementById('pdfFile').files[0];

            if (!title) {
                alert('Please fill out the title for the PDF card.');
                return;
            }

            currentEditingCard.querySelector('h3.course_info').textContent = title;

            if (pdfFile) {
                currentEditingCard.querySelector('.course').onclick = function () {
                    const pdfURL = URL.createObjectURL(pdfFile);
                    window.open(pdfURL, '_blank');
                };
            }
        } else {
            const title = document.getElementById('newFileTitle').value;
            const paragraph = document.getElementById('newFileParagraph').value;
            const documentFile = document.getElementById('newFileDocument').files[0];

            if (!title) {
                alert('Please fill out the title for the New File card.');
                return;
            }

            currentEditingCard.querySelector('h3.course_info').textContent = title;

            if (documentFile) {
                currentEditingCard.querySelector('.course').onclick = function () {
                    window.location.href = '/new-file-page'; // Replace with your target page URL
                };
            }
        }
    } else {
        // Create a new card
        const coursesContainer = document.querySelector('.courses_container');
        let newCard;

        if (cardType === 'pdf') {
            const title = document.getElementById('pdfTitle').value;
            const pdfFile = document.getElementById('pdfFile').files[0];

            if (!title || !pdfFile) {
                alert('Please fill out all fields for the PDF card.');
                return;
            }

            const template = document.getElementById('pdfCardTemplate');
            newCard = template.content.cloneNode(true);
            newCard.querySelector('h3.course_info').textContent = title;

            // Add click event to open the PDF
            newCard.querySelector('.course').onclick = function () {
                const pdfURL = URL.createObjectURL(pdfFile);
                window.open(pdfURL, '_blank');
            };
        } else {
            const title = document.getElementById('newFileTitle').value;
            const paragraph = document.getElementById('newFileParagraph').value;
            const documentFile = document.getElementById('newFileDocument').files[0];

            if (!title) {
                alert('Please fill out the title for the New File card.');
                return;
            }

            const template = document.getElementById('newFileCardTemplate');
            newCard = template.content.cloneNode(true);
            newCard.querySelector('h3.course_info').textContent = title;

            // Add click event to redirect to another page
            newCard.querySelector('.course').onclick = function () {
                window.location.href = '/new-file-page'; // Replace with your target page URL
            };
        }

        // Append the new card to the container
        coursesContainer.appendChild(newCard);
        attachEditListeners();
    }

    // Hide the modal
    const modal = document.getElementById('cardModal');
    modal.style.display = 'none';

    // Clear the form and reset state
    document.getElementById('cardForm').reset();
    handleCardTypeChange(); // Reset field visibility
    currentEditingCard = null;
}

// Function to handle card editing
function editCard(cardElement) {
    currentEditingCard = cardElement;

    const modal = document.getElementById('cardModal');
    modal.style.display = 'block';

    const cardType = cardElement.querySelector('h3.course_info').textContent;
    if (cardElement.querySelector('p.card-paragraph')) {
        document.getElementById('cardType').value = 'newFile';
        handleCardTypeChange();

        const title = cardElement.querySelector('h3.course_info').textContent;

        document.getElementById('newFileTitle').value = title;
    } else {
        document.getElementById('cardType').value = 'pdf';
        handleCardTypeChange();

        const title = cardElement.querySelector('h3.course_info').textContent;
        document.getElementById('pdfTitle').value = title;
    }
}


// Add event listeners to dynamically created edit buttons
function attachEditListeners() {
    document.querySelectorAll('.edit-btn').forEach(button => {
        button.onclick = function (event) {
            event.stopPropagation(); // Prevent triggering the card's onclick event
            editCard(button.closest('.course'));
        };
    });
}

// Function to hide the modal when clicking outside of it
window.onclick = function(event) {
    const modal = document.getElementById('cardModal');
    if (event.target === modal) {
        modal.style.display = 'none';
    }
};

// Initialize default field visibility
handleCardTypeChange();
