import { Controller } from '@hotwired/stimulus'
import { enter, leave } from 'el-transition'

export default class extends Controller {
    static targets = ['content']

    static values = {
        open: false,
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

    closeWhenClickedOutside(event) {
        if (! this.element.contains(event.target)) {
            this.close()
        }
    }

    closeNow() {
        this.contentTarget.classList.add('hidden')
        this.close()
    }

    // private

    openValueChanged() {
        if (this.openValue) {
            enter(this.contentTarget)
        } else {
            leave(this.contentTarget)
        }
    }
}
