import java.io.*;
import javax.xml.parsers.*;
import org.w3c.dom.*;
import javax.xml.transform.*;
import javax.xml.transform.dom.DOMSource;
import javax.xml.transform.stream.StreamResult;
import javax.xml.transform.stream.StreamSource;
import javax.xml.xpath.XPath;
import javax.xml.xpath.XPathConstants;
import javax.xml.xpath.XPathExpression;
import javax.xml.xpath.XPathFactory;

public class global_svg_creator {
	public static void main(String[] arg) throws Exception {

		DocumentBuilderFactory factory = DocumentBuilderFactory.newInstance();
		DocumentBuilder builder = factory.newDocumentBuilder();
		Document doc = builder.parse("global_data.xml");

		TransformerFactory transformerFactory = TransformerFactory.newInstance();
		Source xslt = new StreamSource(new File("data_to_svg.xsl"));
		Transformer transformer = transformerFactory.newTransformer(xslt);
		
		File output = new File("output");
		if (! output.exists()) {
			output.mkdir();
        }		
		    
		int x = 1;
		
        XPathFactory xpathFactory = XPathFactory.newInstance();
        XPath xpath = xpathFactory.newXPath();

		NodeList list = doc.getFirstChild().getChildNodes();

		for (int i = 0; i < list.getLength(); i++) {
			Node element = list.item(i).cloneNode(true);
			if (element.hasChildNodes()) {
				Source src = new DOMSource(element);
				String title = getTitle(doc, xpath, x);
				FileOutputStream fs = new FileOutputStream("output/" + title + ".svg");
				Result dest = new StreamResult(fs);
				transformer.transform(src, dest);
				fs.close();
				x++;
			}
		}
	}
	
	public static String getTitle(Document doc, XPath xpath, int index) throws Exception {
		XPathExpression expr = xpath.compile("data/song[" + index + "]/title");
		String title = (String) expr.evaluate(doc, XPathConstants.STRING);
		return title.replaceAll(" ", "_").toLowerCase();
	}
}
