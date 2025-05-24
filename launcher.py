# EXPERIMENTAL

# allows the thingy to be accessed at a keybind, shift+M to launch, shift+esc to close.

import webview
import threading
import keyboard  # pip install keyboard
import time

def hotkey_listener():
    while True:
        if keyboard.is_pressed('shift+esc'):
            webview.windows[0].hide()
            while keyboard.is_pressed('shift+esc'):
                time.sleep(0.1)

        if keyboard.is_pressed('shift+m'):
            webview.windows[0].show()
            while keyboard.is_pressed('shift+m'):
                time.sleep(0.1)

        time.sleep(0.05)

if __name__ == '__main__':
    # Create window hidden initially
    window = webview.create_window('Mod Manager', 'http://localhost', hidden=True, on_top=True,frameless=True)

    # Run hotkey listener in a background thread AFTER window is created
    threading.Thread(target=hotkey_listener, daemon=True).start()

    # Start the event loop (blocking call)
    webview.start()
