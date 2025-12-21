<?php
if ($_SERVER['REQUEST_URI'] == $_SERVER['PHP_SELF']) header("Location: home");
?>

<main class="flex flex-col bg-white z-10">
    <div class="w-full px-4 sm:px-6 lg:px-8 py-8">
        <!-- Breadcrumb -->
        <nav class="mb-6">
            <a href="<?php echo URL ?>" class="text-blue-600 hover:text-blue-800">Home</a>
            <span class="mx-2 text-gray-500">/</span>
            <span class="text-gray-700">Notice Details</span>
        </nav>

        <!-- Notice Display -->
        <div class="bg-white shadow-lg rounded-lg p-6 mb-6">
            <h1 id="noticeTitle" class="text-2xl md:text-3xl font-bold text-gray-800 mb-4"></h1>
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center text-sm text-gray-500">
                <span id="noticeDate" class="text-red-500"></span>
                <span id="noticeAudience" class="mt-2 md:mt-0 bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-xs font-medium"></span>
            </div>
            <!-- Notice Content -->
            <div id="noticeContent" class="prose prose-blue max-w-none text-gray-700 mt-2"></div>

            <!-- Attachment -->
            <div id="attachmentSection" class="mt-2 hidden">
                <h3 class="text-lg font-semibold text-gray-800 mb-2">Attachment</h3>
                <div id="attachmentList" class="flex flex-wrap gap-2"></div>
            </div>
        </div>
    </div>
</main>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const storedNotice = sessionStorage.getItem('selectedNotice');
        const content = document.getElementById('noticeContent');

        if (!storedNotice) {
            content.innerHTML = '<p class="text-red-500">Notice not found.</p>';
            return;
        }

        try {
            const notice = JSON.parse(storedNotice);

            // --- BASIC INFO ---
            document.getElementById('noticeTitle').textContent = sanitizeText(notice.notice_title || 'Untitled Notice');
            document.getElementById('noticeDate').textContent = `Publish Date: ${sanitizeText(notice.formatted_publish_date || 'N/A')}`;
            document.getElementById('noticeAudience').textContent =
                `${sanitizeText(notice.class_name || '')}${notice.section_name ? ' - ' + sanitizeText(notice.section_name) : ''}`;

            // --- BODY ---
            // Sanitize the body content before inserting it
            const sanitizedBody = sanitizeText(notice.notice_body || '');
            content.innerHTML = sanitizedBody ?
                sanitizedBody.replace(/\r\n/g, '<br>').replace(/\n/g, '<br>') :
                '<p class="text-gray-600">No content available.</p>';

            // --- ATTACHMENT & LINK ---
            const attachmentSection = document.getElementById('attachmentSection');
            const attachmentList = document.getElementById('attachmentList');
            attachmentList.innerHTML = '';

            const filePath = notice.attachment || notice.notice_file || '';
            const webLink = notice.web_link || '';

            // --- Safe file path validation ---
            if (filePath) {
                // Sanitize and validate file path to prevent path traversal
                const sanitizedFilePath = sanitizeFilePath(filePath);
                if (!sanitizedFilePath) {
                    console.error('Invalid file path detected');
                    return;
                }

                const fileName = sanitizedFilePath.split('/').pop();
                const fileExtension = fileName.split('.').pop().toLowerCase();

                const icons = {
                    pdf: '📄',
                    doc: '📝',
                    docx: '📝',
                    xls: '📊',
                    xlsx: '📊',
                    jpg: '🖼️',
                    jpeg: '🖼️',
                    png: '🖼️',
                    gif: '🖼️',
                    zip: '📦',
                    rar: '📦'
                };
                const icon = icons[fileExtension] || '📎';

                // Construct the full URL for the attachment file - prepend with external service URL
                const fullFilePath = sanitizedFilePath.startsWith('http') ? sanitizedFilePath : 'https://app.progatiapp.com/' + sanitizedFilePath;

                // Validate URL to ensure it's from the allowed domain
                if (!fullFilePath.startsWith('https://app.progatiapp.com/')) {
                    console.error('Invalid external URL detected');
                    return;
                }

                // Create a server-side download URL for the attachment
                const encodedFilePath = encodeURIComponent(sanitizedFilePath);
                const downloadUrl = `<?php echo URL; ?>home/download_attachment?file=${encodedFilePath}`;

                // Check if it's a PDF or image file to show inline viewer
                if (fileExtension === 'pdf') {
                    createAttachmentElement(attachmentList, {
                        url: fullFilePath,
                        fileName: fileName,
                        icon: icon,
                        downloadUrl: downloadUrl
                    });

                    // Add a container for the PDF viewer after the attachment section
                    createFileViewerContainer('fileViewerContainer', 'PDF Viewer', fullFilePath, 'application/pdf');
                } else if (['jpg', 'jpeg', 'png', 'gif', 'bmp', 'webp'].includes(fileExtension)) {
                    createAttachmentElement(attachmentList, {
                        url: fullFilePath,
                        fileName: fileName,
                        icon: icon,
                        downloadUrl: downloadUrl
                    });

                    // Add a container for image viewer after the attachment section
                    createImageViewerContainer('imageViewContainer', 'Image Viewer', fullFilePath, fileName);
                } else {
                    // For other file types, just show the link with download option
                    createAttachmentElement(attachmentList, {
                        url: fullFilePath,
                        fileName: fileName,
                        icon: icon,
                        downloadUrl: downloadUrl
                    });
                }
            }

            // --- Web Link ---
            if (webLink) {
                // Sanitize and validate the web link
                const sanitizedWebLink = sanitizeUrl(webLink);
                if (sanitizedWebLink) {
                    createWebLinkElement(attachmentList, sanitizedWebLink);
                }
            }

            // --- Show Section if Anything Exists ---
            if (filePath || webLink) {
                attachmentSection.classList.remove('hidden');
            }

        } catch (err) {
            console.error('Error parsing notice data:', err);
            content.innerHTML = '<p class="text-red-500">Error loading notice details.</p>';
        }

        // Function to sanitize text content to prevent XSS
        function sanitizeText(text) {
            if (typeof text !== 'string') {
                return '';
            }
            const temp = document.createElement('div');
            temp.textContent = text;
            return temp.textContent || temp.innerText || '';
        }

        // Function to sanitize file path to prevent path traversal
        function sanitizeFilePath(filePath) {
            if (typeof filePath !== 'string') {
                return null;
            }

            // Remove any directory traversal attempts
            const normalizedPath = filePath.replace(/(\.\.\/|\.\.\\|%2e%2e%2f|%2e%2e%5c)/gi, '');

            // Ensure it starts with allowed directory
            if (!normalizedPath.startsWith('institute_asset/')) {
                return null;
            }

            return normalizedPath;
        }

        // Function to sanitize URL
        function sanitizeUrl(url) {
            if (typeof url !== 'string') {
                return null;
            }

            try {
                const urlObj = new URL(url);
                // Only allow HTTPS URLs to external sites
                if (urlObj.protocol !== 'https:') {
                    return null;
                }
                return urlObj.href;
            } catch (e) {
                return null;
            }
        }

        // Function to create attachment element safely
        function createAttachmentElement(container, options) {
            const { url, fileName, icon, downloadUrl } = options;
            const element = document.createElement('div');
            element.className = 'flex flex-col sm:flex-row sm:items-center gap-2';

            element.innerHTML = `
                <a href="${escapeHtml(url)}" target="_blank"
                   class="flex items-center gap-2 px-3 py-2 bg-blue-50 border border-blue-200 rounded-lg hover:bg-blue-100 transition-colors flex-grow">
                  <span class="text-lg">${escapeHtml(icon)}</span>
                  <span class="text-blue-700 font-medium truncate max-w-xs">${escapeHtml(fileName)}</span>
                </a>
                <a href="${escapeHtml(downloadUrl)}"
                   class="px-3 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 transition-colors text-center" download>
                   Download Now
                </a>
            `;

            container.appendChild(element);
        }

        // Function to create file viewer container
        function createFileViewerContainer(id, title, url, type) {
            const container = document.createElement('div');
            container.id = id;
            container.className = 'mt-6';
            container.innerHTML = `
                <h3 class="text-lg font-semibold text-gray-800 mb-2">${escapeHtml(title)}</h3>
                <div class="border border-gray-300 rounded-lg overflow-hidden">
                    <iframe src="${escapeHtml(url)}"
                            width="100%"
                            height="600px"
                            type="${escapeHtml(type)}"
                            class="w-full">
                        <p>Your browser doesn't support PDF viewing. <a href="${escapeHtml(url)}" target="_blank">Click here to view</a></p>
                    </iframe>
                </div>
            `;

            attachmentSection.parentNode.insertBefore(container, attachmentSection.nextSibling);
        }

        // Function to create image viewer container
        function createImageViewerContainer(id, title, url, fileName) {
            const container = document.createElement('div');
            container.id = id;
            container.className = 'mt-6';
            container.innerHTML = `
                <h3 class="text-lg font-semibold text-gray-800 mb-2">${escapeHtml(title)}</h3>
                <div class="border border-gray-300 rounded-lg overflow-hidden">
                    <img src="${escapeHtml(url)}"
                         alt="${escapeHtml(fileName)}"
                         class="w-full max-h-[600px] object-contain"
                         onerror="handleImageError(this)">
                </div>
            `;

            attachmentSection.parentNode.insertBefore(container, attachmentSection.nextSibling);
        }

        // Function to create web link element
        function createWebLinkElement(container, url) {
            const element = document.createElement('a');
            element.href = escapeHtml(url);
            element.target = '_blank';
            element.className = 'flex items-center gap-2 px-3 py-2 bg-green-50 border border-green-200 rounded-lg hover:bg-green-100 transition-colors';
            element.innerHTML = `
                <span class="text-lg">🔗</span>
                <span class="text-green-700 font-medium truncate max-w-xs">Open Link</span>
            `;

            container.appendChild(element);
        }

        // Function to escape HTML to prevent XSS
        function escapeHtml(text) {
            if (typeof text !== 'string') {
                return '';
            }
            return text
                .replace(/&/g, "&amp;")
                .replace(/</g, "&lt;")
                .replace(/>/g, "&gt;")
                .replace(/"/g, "&quot;")
                .replace(/'/g, "&#039;");
        }

        // Function to handle image errors
        function handleImageError(img) {
            img.onerror = null;
            img.parentElement.innerHTML = '<p class="text-center py-8 text-gray-500">Unable to load image.</p>';
        }
    });
</script>