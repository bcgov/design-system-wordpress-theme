import { setCurrentYear } from '../../src/scripts/public/current-year';

const CURRENT_YEAR = String(new Date().getFullYear());

function createDoc(html) {
    const doc = document.implementation.createHTMLDocument('test');
    doc.body.innerHTML = html;
    return doc;
}

describe('updateCurrentYear', () => {
    test('replaces all data-current-year values', () => {
        const doc = createDoc(
            '<p>© <span data-current-year>2001</span></p><p>© <span data-current-year>1999</span></p>'
        );
        Object.defineProperty(doc, 'readyState', {
            configurable: true,
            value: 'complete',
        });
        setCurrentYear(doc);
        const values = Array.from(
            doc.querySelectorAll('[data-current-year]')
        ).map((element) => element.textContent);
        expect(values).toEqual([CURRENT_YEAR, CURRENT_YEAR]);
    });

    test('preserves surrounding text', () => {
        const doc = createDoc(
            '<p id="footer">© <span data-current-year>2018</span> Government of British Columbia.</p>'
        );
        Object.defineProperty(doc, 'readyState', {
            configurable: true,
            value: 'complete',
        });
        setCurrentYear(doc);
        expect(doc.getElementById('footer').textContent).toMatch(
            /Government of British Columbia\./
        );
    });

    test('updates datetime attribute on time elements', () => {
        const doc = createDoc(
            '<p>© <time data-current-year datetime="2010">2010</time> Government.</p>'
        );
        Object.defineProperty(doc, 'readyState', {
            configurable: true,
            value: 'complete',
        });
        setCurrentYear(doc);
        const timeElement = doc.querySelector('time[data-current-year]');
        expect(timeElement.textContent).toBe(CURRENT_YEAR);
        expect(timeElement.getAttribute('datetime')).toBe(CURRENT_YEAR);
    });

    test('updates immediately when document is already loaded', () => {
        const doc = createDoc('<p>© <span data-current-year>2011</span></p>');
        Object.defineProperty(doc, 'readyState', {
            configurable: true,
            value: 'complete',
        });
        setCurrentYear(doc);
        expect(doc.querySelector('[data-current-year]').textContent).toBe(
            CURRENT_YEAR
        );
    });

    test('defers update until DOMContentLoaded when document is still loading', () => {
        const doc = createDoc('<p>© <span data-current-year>2010</span></p>');
        Object.defineProperty(doc, 'readyState', {
            configurable: true,
            value: 'loading',
        });
        setCurrentYear(doc);
        doc.dispatchEvent(new Event('DOMContentLoaded'));
        expect(doc.querySelector('[data-current-year]').textContent).toBe(
            CURRENT_YEAR
        );
    });
});
