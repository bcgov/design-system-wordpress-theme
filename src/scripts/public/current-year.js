export function setCurrentYear(targetDocument = document) {
    const year = String(new Date().getFullYear());

    const run = (doc) => {
        doc.querySelectorAll('[data-current-year]').forEach((element) => {
            element.textContent = year;
            if (element.tagName === 'TIME') {
                element.setAttribute('datetime', year);
            }
        });
    };

    // If the document is still loading, wait for DOMContentLoaded, otherwise run now.
    if (targetDocument.readyState === 'loading') {
        targetDocument.addEventListener(
            'DOMContentLoaded',
            () => run(targetDocument),
            {
                once: true,
            }
        );
        return;
    }

    run(targetDocument);
}

// Default export for easier imports
export default setCurrentYear;
