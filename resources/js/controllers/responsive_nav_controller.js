import { Controller } from '@hotwired/stimulus'

// Usage data-controller="responsive-nav"
export default class extends Controller {
    static values = {
        open: false,
    }

    open() {
        this.openValue = true
    }

    close() {
        this.openValue = false
    }

    toggle() {
        this.openValue = ! this.openValue
    }

    closeWhenClickedOutside(event) {
        if (! this.element.contains(event.target)) {
            this.close()
        }
    }
}
