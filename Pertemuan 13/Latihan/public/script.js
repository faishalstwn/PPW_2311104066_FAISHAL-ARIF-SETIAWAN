

const API_URL = 'http://localhost:3000/api/mahasiswa';


document.addEventListener('DOMContentLoaded', () => {
    loadMahasiswa();
    
    // Event listener untuk form submit
    document.getElementById('mahasiswaForm').addEventListener('submit', handleSubmit);
    
    // Event listener untuk tombol batal
    document.getElementById('cancelBtn').addEventListener('click', resetForm);
});


async function loadMahasiswa() {
    try {
        const response = await fetch(API_URL);
        const result = await response.json();
        
        const tbody = document.getElementById('mahasiswaTableBody');
        
        if (result.success && result.data.length > 0) {
            tbody.innerHTML = '';
            result.data.forEach((mahasiswa, index) => {
                const row = `
                    <tr>
                        <td>${index + 1}</td>
                        <td>${mahasiswa.nama}</td>
                        <td>${mahasiswa.nim}</td>
                        <td>${mahasiswa.jurusan}</td>
                        <td>${mahasiswa.email}</td>
                        <td>
                            <button class="action-btn btn-edit" onclick="editMahasiswa(${mahasiswa.id})">
                                ✏️ Edit
                            </button>
                            <button class="action-btn btn-delete" onclick="deleteMahasiswa(${mahasiswa.id})">
                                🗑️ Hapus
                            </button>
                        </td>
                    </tr>
                `;
                tbody.innerHTML += row;
            });
        } else {
            tbody.innerHTML = '<tr><td colspan="6" class="no-data">Tidak ada data mahasiswa</td></tr>';
        }
    } catch (error) {
        console.error('Error:', error);
        showToast('Gagal memuat data', 'error');
    }
}


async function handleSubmit(e) {
    e.preventDefault();
    
    const id = document.getElementById('mahasiswaId').value;
    const nama = document.getElementById('nama').value;
    const nim = document.getElementById('nim').value;
    const jurusan = document.getElementById('jurusan').value;
    const email = document.getElementById('email').value;
    
    const data = { nama, nim, jurusan, email };
    
    try {
        let response;
        if (id) {
            // Update
            response = await fetch(`${API_URL}/${id}`, {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(data)
            });
        } else {
            // Create
            response = await fetch(API_URL, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(data)
            });
        }
        
        const result = await response.json();
        
        if (result.success) {
            showToast(result.message, 'success');
            resetForm();
            loadMahasiswa();
        } else {
            showToast(result.message, 'error');
        }
    } catch (error) {
        console.error('Error:', error);
        showToast('Terjadi kesalahan saat menyimpan data', 'error');
    }
}

async function editMahasiswa(id) {
    try {
        const response = await fetch(`${API_URL}/${id}`);
        const result = await response.json();
        
        if (result.success) {
            const mahasiswa = result.data;
            
            
            document.getElementById('mahasiswaId').value = mahasiswa.id;
            document.getElementById('nama').value = mahasiswa.nama;
            document.getElementById('nim').value = mahasiswa.nim;
            document.getElementById('jurusan').value = mahasiswa.jurusan;
            document.getElementById('email').value = mahasiswa.email;
            
            
            document.getElementById('form-title').textContent = 'Edit Data Mahasiswa';
            document.getElementById('submitBtn').textContent = '💾 Update Data';
            document.getElementById('cancelBtn').style.display = 'block';
            
            
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }
    } catch (error) {
        console.error('Error:', error);
        showToast('Gagal mengambil data mahasiswa', 'error');
    }
}


async function deleteMahasiswa(id) {
    if (!confirm('Apakah Anda yakin ingin menghapus data mahasiswa ini?')) {
        return;
    }
    
    try {
        const response = await fetch(`${API_URL}/${id}`, {
            method: 'DELETE'
        });
        
        const result = await response.json();
        
        if (result.success) {
            showToast(result.message, 'success');
            loadMahasiswa();
        } else {
            showToast(result.message, 'error');
        }
    } catch (error) {
        console.error('Error:', error);
        showToast('Gagal menghapus data', 'error');
    }
}


function resetForm() {
    document.getElementById('mahasiswaForm').reset();
    document.getElementById('mahasiswaId').value = '';
    document.getElementById('form-title').textContent = 'Tambah Mahasiswa Baru';
    document.getElementById('submitBtn').textContent = '➕ Tambah Mahasiswa';
    document.getElementById('cancelBtn').style.display = 'none';
}


function showToast(message, type) {
    const toast = document.getElementById('toast');
    toast.textContent = message;
    toast.className = `show ${type}`;
    
    setTimeout(() => {
        toast.className = '';
    }, 3000);
}
