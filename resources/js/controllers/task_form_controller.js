import { Controller } from "@hotwired/stimulus"
import { nextFrame } from "helpers/timing";

// Connects to data-controller="task-form"
export default class extends Controller {
    static targets = ['clientId', 'text', 'template', 'tasks']
    static outlets = ['form', 'autogrow']

    async submitByKeyboard(event) {
        if (event.shiftKey) return

        this.optimisticSubmit()
    }

    async optimisticSubmit() {
        if (! this.#validInput()) return;

        const clientId = this.#generateClientId()

        this.#insertPendingTask(clientId)

        await nextFrame()

        this.clientIdTarget.value = clientId
        this.formOutlet.asyncSubmit()
        this.formOutlet.reset()
        this.autogrowOutlet.reset()
    }

    #validInput() {
        return this.textTarget.value.trim().length > 0
    }

    #generateClientId() {
        return Math.random().toString(36).slice(2)
    }

    #insertPendingTask(clientId) {
        const html = this.#createFromTemplate({
            clientId,
            body: this.textTarget.value,
        })

        this.tasksTarget.insertAdjacentHTML("beforeend", html)
    }

    #createFromTemplate(data) {
        let html = this.templateTarget.innerHTML

        for (const key in data) {
            html = html.replaceAll(`$${key}$`, data[key]);
        }

        return html
    }
}
