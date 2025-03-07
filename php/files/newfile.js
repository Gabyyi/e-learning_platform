const uploadArea = document.getElementById('upload-area');
const fileInput = document.getElementById('file-upload');
const fileList = document.getElementById('file-list');

uploadArea.addEventListener('dragover', (event) => {
    event.preventDefault();
    uploadArea.classList.add('dragging');
});

uploadArea.addEventListener('dragleave', () => {
    uploadArea.classList.remove('dragging');
});

uploadArea.addEventListener('drop', (event) => {
    event.preventDefault();
    uploadArea.classList.remove('dragging');
    const files = event.dataTransfer.files;
    handleFiles(files);
});

uploadArea.addEventListener('click', () => {
    fileInput.click();
});

fileInput.addEventListener('change', () => {
    const files = fileInput.files;
    handleFiles(files);
});

function handleFiles(files) {
    for (const file of files) {
        // Display each file in the list
        const listItem = document.createElement('li');

        // Create a download link for the file
        const link = document.createElement('a');
        link.href = URL.createObjectURL(file);
        link.download = file.name;
        link.textContent = file.name;

        // Create a Remove button
        const removeButton = document.createElement('button');
        removeButton.textContent = 'Remove';
        removeButton.style.marginLeft = '10px';
        removeButton.onclick = () => removeFile(listItem);

        listItem.appendChild(link);
        listItem.appendChild(removeButton);

        fileList.appendChild(listItem);
    }
}

function removeFile(listItem) {
    fileList.removeChild(listItem);
}
