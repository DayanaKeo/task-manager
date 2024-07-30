import os
from fpdf import FPDF

class PDF(FPDF):
    def header(self):
        self.set_font('Arial', 'B', 12)
        self.cell(0, 10, 'Laravel Project Tree Structure', 0, 1, 'C')
        self.ln(10)

    def chapter_title(self, title):
        self.set_font('Arial', 'B', 12)
        self.cell(0, 10, title, 0, 1)
        self.ln(5)

    def chapter_body(self, body):
        self.set_font('Arial', '', 12)
        self.multi_cell(0, 10, body)
        self.ln()

def list_files(startpath):
    structure = ''
    for root, dirs, files in os.walk(startpath):
        level = root.replace(startpath, '').count(os.sep)
        indent = ' ' * 4 * (level)
        structure += '{}{}/\n'.format(indent, os.path.basename(root))
        subindent = ' ' * 4 * (level + 1)
        for f in files:
            structure += '{}{}\n'.format(subindent, f)
    return structure

def main():
    startpath = '.'  # Specify the root directory of your Laravel project
    tree_structure = list_files(startpath)

    pdf = PDF()
    pdf.add_page()
    pdf.chapter_title('Project Structure')
    pdf.chapter_body(tree_structure)
    pdf.output('Laravel_Project_Structure.pdf')

if __name__ == "__main__":
    main()
