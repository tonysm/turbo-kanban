import { Controller } from '@hotwired/stimulus'
import { enter, leave } from 'el-transition'

// Usage: data-controller="modal"
export default class extends Controller {
    static targets = ['content', 'overlay']

    static values = {
        open: { type: Boolean, default: false },
        focusable: { type: Boolean, default: false },
    }

    toggle() {
        this.openValue = ! this.openValue
    }

    open() {
        this.openValue = true
    }

    close() {
        this.openValue = false
    }

    openWhenIdMatches(event) {
        if (event.detail === this.element.id) {
            this.open()
        }
    }

    changeFocus({ shiftKey }) {
        if (shiftKey)  {
            this.prevFocusable.focus()
        } else {
            this.nextFocusable.focus()
        }
    }

    closeNow() {
        document.body.classList.remove('overflow-y-hidden')
        this.element.classList.add('hidden')
        this.overlayTarget.classList.add('hidden')
        this.contentTarget.classList.add('hidden')
        this.close()
    }

    get focusables() {
        // All focusable element types...
        let selector = 'a, button, input:not([type=\'hidden\']), textarea, select, details, [tabindex]:not([tabindex=\'-1\'])'

        return [...this.element.querySelectorAll(selector)]
            .filter(el => ! el.hasAttribute('disabled'))
    }

    get firstFocusable() { return this.focusables[0] }

    get lastFocusable() { return this.focusables.slice(-1)[0] }

    get nextFocusable() { return this.focusables[this.nextFocusableIndex] || this.firstFocusable }

    get prevFocusable() { return this.focusables[this.prevFocusableIndex] || this.lastFocusable }

    get nextFocusableIndex() { return (this.focusables.indexOf(document.activeElement) + 1) % (this.focusables.length + 1) }

    get prevFocusableIndex() { return Math.max(0, this.focusables.indexOf(document.activeElement)) -1 }

    // private

    openValueChanged() {
        if (this.openValue) {
            document.body.classList.add('overflow-y-hidden')

            Promise
                .all([this.element, this.overlayTarget, this.contentTarget].map(el => enter(el)))
                .then(() => {
                    if (this.focusableValue) {
                        this.firstFocusable.focus()
                    }
                })
        } else {
            document.body.classList.remove('overflow-y-hidden')

            Promise.all([this.contentTarget, this.overlayTarget, this.element].map(el => leave(el)))
        }
    }
}
